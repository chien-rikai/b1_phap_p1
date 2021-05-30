<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Excel;
use App\Exports\RevenueExport;

class RevenueMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $attach = [
            'today' => [
                'file' => new RevenueExport('today'),
                'name' => __('common.revenue_today').'.xlsx',
            ],

            'month' => [
                'file' => new RevenueExport('month'),
                'name' => __('common.revenue_this_month').'.xlsx',
            ],

            'year' => [
                'file' => new RevenueExport('year'),
                'name' => __('common.revenue_year').'.xlsx',
            ]
        ];

        return $this->subject(__('message.report_revenue'))
                    ->view('mails.vi.revenue')
                    ->attach(Excel::download($attach[$this->type]['file'], $attach[$this->type]['name'])->getFile(),
                    [
                        'as' =>  $attach[$this->type]['name'],
                    ]);
    }
}
