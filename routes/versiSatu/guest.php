<?php

return [
    /**
     * @SWG\Get(
     *   path="/v1/about",
     *   summary="About app",
     *   tags={"Guest"},
     *   @SWG\Response(
     *     response=200,
     *     description="Detail Information App",
     *     @SWG\Schema(ref="#/definitions/About")
     *   )
     * )
     */
    'GET about' => 'guest/index',

    /**
     * @SWG\Post(
     *     path="/v1/login",
     *     summary="Login to the application",
     *     tags={"Guest"},
     *     description="Login to app for get Token access",
     *     @SWG\Parameter(
     *         name="username",
     *         in="formData",
     *         type="string",
     *         description="Your Username",
     *         required=true,
     *     ),
     *     @SWG\Parameter(
     *         name="password",
     *         in="formData",
     *         type="string",
     *         description="Your Password",
     *         required=true,
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="data user",
     *         @SWG\Schema(ref="#/definitions/LoginForm")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST login' => 'guest/login',

    /**
     * @SWG\Post(
     *     path="/v1/register",
     *     summary="Register new user",
     *     tags={"Guest"},
     *     description="Register new user",
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Data Register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/NewUser"),
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Data user",
     *         @SWG\Schema(ref="#/definitions/LoginForm")
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="ValidateErrorException",
     *         @SWG\Schema(ref="#/definitions/ErrorValidate")
     *     )
     * )
     */
    'POST register' => 'guest/register',
];