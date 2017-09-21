<?php

return [

    /**
     * @SWG\Get(
     *     path="/v1/news",
     *     summary="Get list news",
     *     tags={"News"},
     *     @SWG\Response(
     *         response=200,
     *         description="News",
     *         @SWG\Schema(
     *            type="array",
     *            @SWG\Items(ref="#/definitions/News")
     *         )
     *     ),
     *     @SWG\Response(
     *        response=401,
     *        description="Unauthorized",
     *        @SWG\Schema(ref="#/definitions/Unauthorized")
     *     )
     * )
     */
    'GET news' => 'news/index',

    /**
     * @SWG\Post(
     *     path="/v1/news",
     *     summary="Create data news",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data News",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/CreateNews"),
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Data news",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST news' => 'news/create',

    /**
     * @SWG\Put(
     *     path="/v1/news/{id}",
     *     summary="Update data news",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data News",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/UpdateNews"),
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Data news",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'PUT news/{id}' => 'news/update',


    /**
     * @SWG\Get(
     *     path="/v1/news/{id}",
     *     summary="Get data news",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Data news",
     *         @SWG\Schema(ref="#/definitions/News")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'GET news/{id}' => 'news/view',

    /**
     * @SWG\Delete(
     *     path="/v1/news/{id}",
     *     summary="Delete data news",
     *     tags={"News"},
     *     @SWG\Parameter(
     *         ref="#/parameters/id"
     *     ),
     *     @SWG\Response(
     *         response=202,
     *         description="Status Delete",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Resource not found",
     *         @SWG\Schema(ref="#/definitions/Not Found")
     *     )
     * )
     */
    'DELETE news/{id}' => 'news/delete',
];