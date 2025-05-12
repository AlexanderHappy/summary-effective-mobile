<?php

namespace App\Http\Controllers;

use App\Dto\DtoTasks;
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
                })->toArray()
        );
    }

    function show(int $id)
    {
        return response()->json(
            $this->serviceTasks->show($id)->getPropsInArray()
        );
    }

    function edit()
    {
        // TODO: Implement edit() method.
    }

    /**
     * @throws ExceptionWrongDataTasksProvided
     */
    function store(Request $request): JsonResponse
    {
        /*
         * Валидируем типы предоставленных данных
         * */
        $this->validator::validateStore($request);
        /*
         * Проверяем существует ли статус по предоставленному Id-шнику.
         * */
        $this->validator::validateIdStatus($request->input('status'));

        $result = $this->serviceTasks->store(
            new DtoTasks(
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

    function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
