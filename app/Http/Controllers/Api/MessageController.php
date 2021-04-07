<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\MessageCtaStoreRequest;
use App\Http\Requests\Api\MessageStoreRequest;
use App\Models\Message;
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
            $response_message = 'Thank you, I will reply your mail you soon.';
            if ($request->header('X-LANG') == 'id') {
                $response_message = 'Terima kasih, saya akan membalas email Anda segera.';
            }

            Message::create([
                'name' => trim($request->name),
                'email' => trim($request->email),
                'message' => trim($request->message)
            ]);

            $status = 200;
            $message = $response_message;
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
            $response_message = 'Thank you, I will mail you soon.';
            if ($request->header('X-LANG') == 'id') {
                $message = 'Halo bro, Saya pengunjung websitemu. Ada yang ingin saya bicarakan.';
                $response_message = 'Terima kasih, saya akan mengirimkan email kepada Anda segera.';
            }

            Message::create([
                'name' => 'Guest',
                'email' => trim($request->email),
                'message' => $message
            ]);

            $status = 200;
            $message = $response_message;

        } catch (\Throwable $th) {
            report($th);

            $status = 500;
            $message = __('global.something_went_wrong');
        }

        return $this->apiResponse($status, $message);
    }
}
