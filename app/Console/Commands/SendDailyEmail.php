<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Clients;

class SendDailyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ln:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send the daily email';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      $clients = Client::where('birthday', '=', Carbon::now()->toDateString())->get();
      if (count($clients) > 0) {
        return $this->email($clients);
        }
    }

    protected function email($clients)
    {
      $auth = ['api_key' => config('services.campaign-monitor.key')];
      $cm = new CS_REST_Campaigns(null, $auth);

      $draft = $cm->create(config('services.campaign-monitor.client_id'), [
          'Subject' => $clients->first()->title,
          'Name' => 'Daily Email ('.date("Y-m-d").')',
          'FromName' => 'Estetica Galante',
          'FromEmail' => 'auguri@esteticagalante.it',
          'ReplyTo' => 'auguri@esteticagalante.it',
          'HtmlUrl' => 'https://www.esteticagalante.netsons.org/auguri.html',
          'ListIDs' => [config('services.campaign-monitor.daily_id')],
        ]);

        $cm->set_campaign_id($draft->response);

        $result = $cm->send(array(
          'ConfirmationEmail' => 'auguri@esteticagalante.it',
          'SendDate' => 'immediately'
        ));
      }

}
