<?php

namespace App\Traits;

trait ApiResponser
{
    /**
     * API response format.
     *
     * @param int $status
     * @param string $message
     * @param mixed|null $data
     * @return \Illuminate\Http\Response
     */
    public function apiResponse($status, $message, $data = null)
    {
        $data = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($data, $status);
    }
}
