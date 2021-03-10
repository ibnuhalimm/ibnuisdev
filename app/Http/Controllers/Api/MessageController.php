<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MessageCtaStoreRequest;
use App\Http\Requests\Api\MessageStoreRequest;
use App\Message;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    use ApiResponser;

    /**
     * Send message from contact page
     *
     * @return \Iluminate\Http\Response
     */
    public function store(MessageStoreRequest $request)
    {
        try {
            Message::create([
                'name' => trim($request->name),
                'email' => trim($request->email),
                'message' => trim($request->message)
            ]);

            $status = 200;
            $message = 'Success';
        } catch (\Throwable $th) {
            report($th);

            $status = 500;
            $message = 'Something went wrong';
        }

        return $this->apiResponse($status, $message);
    }


    /**
     * Send message from homepage CTA
     *
     * @return \Iluminate\Http\Response
     */
    public function storeFromCta(MessageCtaStoreRequest $request)
    {
        try {
            $message = 'Hi bro, I am visitor on your website. I just want to talk to you.';
            if ($request->header('X-LANG') == 'id') {
                $message = 'Halo bro, Saya pengunjung websitemu. Ada yang ingin saya bicarakan.';
            }

            Message::create([
                'name' => 'Guest',
                'email' => trim($request->email),
                'message' => $message
            ]);

            $status = 200;
            $message = 'Success';
        } catch (\Throwable $th) {
            report($th);

            $status = 500;
            $message = 'Something went wrong';
        }

        return $this->apiResponse($status, $message);
    }
}
