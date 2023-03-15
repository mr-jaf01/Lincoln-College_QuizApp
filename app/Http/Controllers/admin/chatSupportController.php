<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chatSupport;


use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

class chatSupportController extends Controller
{
    public function chatSupportPage(){
        $all_msg = chatSupport::orderBy('id', 'DESC')->get();
        return view('admin.dashboard.chat.chat', compact('all_msg'));
    }

    public function chatReplyPage()
    {
        return view('admin.dashboard.chat.reply');
    }

    public function sendreplytoEmail(Request $request)
    {

        try {
            $body = '
                <div background-color:(243 244 246);  padding:24px; height:50vh">
                    <div id="main" style="padding: 32px; border-radius:19px; width: 500px;
                        margin: auto;
                        background-color: white;">

                        <h4 style="font-size:14px;">Dear, '.$request->name.'</h4>
                        <span style="text-align: start;  margin-bottom:20px; color: #00302E;">'.$request->message.'</span><br><br>

                    </div>
                    <p style="text-align: center;">Not you? If you didn\'t Contact SPM SPS SUPPORT ( Lincoln University College, Malaysia ), you can safely ignore this email.</p>
                </div>
                ';
            $transport = Transport::fromDsn('smtp://SPMSPS@1690.tk:1994_Xujaf@1690.tk:465');
                //$mailer = new Mailer($transport);

                //$transport = Transport::fromDsn('smtp://localhost');
                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from('SPMSPS@1690.tk')
                    ->to($request->email)
                    //->cc('SPMSPS@1690.tk')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    ->subject('SPM SPS SYSTEM ( Lincoln University College, Malaysia )')
                    ->html($body);

            $mailer->send($email);
            chatSupport::where('id', $request->id)->update(['replied'=>'yes']);

            return redirect('/admin/dashboard/chat-support-center')->with('success', 'Reply Send To Email Successfully');

        } catch (\Throwable $th) {

           return Back()->with('error', 'Something went wrong, Please try again!');
        }
    }
}
