<?php

namespace App\Http\Controllers;

use App\Dto\DtoTask;
use App\Exception\Requests\ExceptionWrongDataTasksProvided;
use App\Service\ServiceTasks;
use App\Validators\Requests\ValidatorTasks;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

readonly class TasksController extends AbstractTodoController
{
    public function __construct(
        private ValidatorTasks $validator,
        private ServiceTasks   $serviceTasks,
    )
    {
    }

    function index(): JsonResponse
    {
        return response()->json(
            $this->serviceTasks->index()
                ->map(function ($task) {
                    return $task->getPropsInArray();
                })
        );
    }

    function read(int $taskId)
    {
        return response()->json(
            $this->serviceTasks->read($taskId)
                ->getPropsInArray()
        );
    }


    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    function edit(Request $request, int $taskId): JsonResponse
    {
        /*
         * Валидируем типы предоставленных данных
         * */
        $this->validator::validateProvidedData($request);
        /*
         * Проверяем существует ли статус по предоставленному Id-шнику.
         * */
        $this->validator::validateIdStatus($request->input('status'));

        $result = $this->serviceTasks->edit(
            new DtoTask(
                id: $taskId,
                title: $request->input('title'),
                description: $request->input('description'),
                status: $request->input('status'),
            )
        );

        return response()->json([
            'result' => $result,
            'message' => 'Record is updated successfully.',
        ]);
    }

    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    function store(Request $request): JsonResponse
    {
        /*
         * Валидируем типы предоставленных данных
         * */
        $this->validator::validateProvidedData($request);
        /*
         * Проверяем существует ли статус по предоставленному Id-шнику.
         * */
        $this->validator::validateIdStatus($request->input('status'));

        $result = $this->serviceTasks->store(
            new DtoTask(
                id: null,
                title: $request->input('title'),
                description: $request->input('description'),
                status: $request->input('status'),
            )
        );

        return response()->json([
            'result' => $result,
            'message' => 'Record is added successfully.',
        ]);
    }

    function destroy(int $taskId): JsonResponse
    {
        return response()->json([
            'result' => $this->serviceTasks->destroy($taskId),
            'message' => 'Record is deleted successfully.',
        ]);
    }
}
