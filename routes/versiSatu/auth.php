<?php

return [
    /**
     * @SWG\Get(
     *   path="/v1/me",
     *   summary="Get current user",
     *   tags={"Auth"},
     *   @SWG\Response(
     *     response=200,
     *     description="Detail User",
     *     @SWG\Schema(ref="#/definitions/About")
     *   )
     * )
     */
    'GET me' => 'auth/me'
];