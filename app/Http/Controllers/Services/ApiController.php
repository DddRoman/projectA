<?php

namespace App\Http\Controllers\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ApiController extends Controller
{
    const CODE_200 = 200;
    const CODE_201 = 201;
    const CODE_404 = 404;
    const CODE_409 = 409;
    const CODE_412 = 412;
    const CODE_403 = 403;

  /**
   * @param string $message
   * @param ResourceCollection|JsonResource|array $data
   * @return JsonResponse
   */
    protected function successJsonAnswer200(string $message, ResourceCollection|JsonResource|array $data = []): JsonResponse
    {
        return response()->json([
            'status' => self::CODE_200,
            'success' => true,
            'message' => $message,
            'data' => $data
        ])->setStatusCode(self::CODE_200);
    }

    /**
     * @param string $message
     * @param ResourceCollection|JsonResource|array $data
     * @return JsonResponse
     */
    protected function successJsonAnswer201(string $message, ResourceCollection|JsonResource|array $data = []): JsonResponse
    {
        return response()->json([
            'status' => self::CODE_201,
            'success' => true,
            'message' => $message,
            'data' => $data
        ])->setStatusCode(self::CODE_201);
    }

    /**
     * @param string $message
     * @param array $data
     * @return JsonResponse
     */
    protected function errorJsonAnswer404(string $message, array $data = []): JsonResponse
    {
        return response()->json([
            'status' => self::CODE_404,
            'success' => false,
            'message' => $message,
            'data' => $data
        ])->setStatusCode(self::CODE_404);
    }

    protected function errorJsonAnswer409(string $message, array $data = []): JsonResponse
    {
        return response()->json([
            'status' => self::CODE_409,
            'success' => false,
            'message' => $message,
            'data' => $data
        ])->setStatusCode(self::CODE_409);
    }

  /**
   * @param string $message
   * @return JsonResponse
   */

  protected function errorJsonAnswer412(string $message): JsonResponse
  {
    return response()->json([
      'status' => self::CODE_412,
      'success' => false,
      'message' => $message,
    ])->setStatusCode(self::CODE_412);
  }

  /**
   * @param string $message
   * @return JsonResponse
   */

  protected function errorJsonAnswer403(string $message): JsonResponse
  {
    return response()->json([
      'status' => self::CODE_403,
      'success' => false,
      'message' => $message,
    ])->setStatusCode(self::CODE_403);
  }
}
