<?php

return [
    /**
     * @SWG\Get(
     *   path="/v1/me",
     *   summary="Get current user",
     *   tags={"Auth"},
     *   @SWG\Response(
     *     response=200,
     *     description="Data user",
     *     @SWG\Schema(ref="#/definitions/CurrentUser")
     *   ),
     *   @SWG\Response(
     *     response=401,
     *     description="Unauthorized",
     *     @SWG\Schema(ref="#/definitions/Unauthorized")
     *   )
     * )
     */
    'GET me' => 'auth/me'
];