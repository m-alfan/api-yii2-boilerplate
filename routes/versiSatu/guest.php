<?php

return [
    /**
     * @SWG\Get(
     *   path="/v1/about",
     *   summary="About",
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
     *     summary="Login",
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
     *         description="pet response",
     *     )
     * )
     */
    'POST login' => 'guest/login',
];