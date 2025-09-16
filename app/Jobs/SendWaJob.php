<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $wa_number;
    protected $text;
    protected $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $wa_number, $slug)
    {
        $this->name = $name;
        $this->wa_number = $wa_number;
        $this->text = "Assalamualaikum " . $this->name . ",\n\n" .
            "Hari ini pesta pernikahan ". $slug . " loh". "\n" .
            "Jangan sampai ga hadir yaa" . "\n".
            "Terimakasih" ."\n\n".
            "Bot Created by Edo Susanto" ."\n";

        $this->file = 'https://weddinggue.online/assets/landing/assets/images/portfolio/7.JPG';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $client->request('POST', 'http://api.textmebot.com/send.php', [
            'query' => [
                'recipient' => '+'.$this->wa_number,
                'apikey' => config('app.text_me_bot'),
                'text' => $this->text,
                'file' => $this->file,
            ]
        ]);
    }
}
