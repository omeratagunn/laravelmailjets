<?php

namespace tyraelll\laravelmailjet;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Mailjet\Resources;
use phpDocumentor\Reflection\Types\Object_;
use SebastianBergmann\Diff\ConfigurationException;
class laravelmailjet
{
    private $api_key;
    private $secret_key;
    protected $view;
    protected $to;
    protected $from;
    protected $data;
    protected $app_name;
    protected $user_name;
    protected $subject;

    /**
     * LaravelMailJet constructor.
     */
    public function __construct()
    {
       // check if config file published and parameters filled //
        if(!empty(SetupConfig::checkConfig())){
            $message = SetupConfig::checkConfig()['Message'];
            throw new Warning($message);
        }
        // all ok, set //
        $this->api_key = Config::get('laravelmailjet')['MAILJET_KEY'];
        $this->secret_key = Config::get('laravelmailjet')['MAILJET_SECRET'];
        $this->from = Config::get('laravelmailjet')['ADMIN_MAIL'];
        $this->app_name = Config::get('laravelmailjet')['APP_NAME'];
    }

    /**
     * @param string $view
     */
    public function view(string $view) : void {

        $this->view = $view;

    }


    /**
     * @param string $view
     * @param $data
     * @throws \Throwable
     */
    public function viewWithData(string $view, $data) : void{
        // send data as an object //
        $this->view = view($view)->with(compact('data'))->render();

    }

    /**
     * @param string $to
     */
    public function to(string $to) : void{

        $this->to = $to;

    }

    /**
     * @param string $name
     */
    public function name(string $name) : void{

        $this->user_name = $name;

    }

    /**
     * @param string $subject
     */
    public function subject(string $subject) : void{

        $this->subject = $subject;

    }

    public function send(){

        try {
            $mj = new \Mailjet\Client($this->api_key, $this->secret_key,
                true, ['version' => 'v3.1']);
            $body = [
                'Messages' => [
                    [
                        'From' => [
                            'Email' => $this->from,
                            'Name' => $this->app_name
                        ],
                        'To' => [
                            [
                                'Email' => $this->to,
                                'Name' => $this->user_name
                            ]
                        ],
                        'Subject' => $this->subject,
                        'HTMLPart' => $this->view
                    ]
                ]
            ];

            $response = $mj->post(Resources::$Email, ['body' => $body]);
            if (!$response->success()) {
                return $response->getData();
            }
        }
        catch (\Exception $e){
            Log::channel('infolog')->alert('Mailing service has some issue... Maybe wrong config ?  Exception : ' . $e->getCode(). ' | '. $e->getMessage());
        }

    }
}