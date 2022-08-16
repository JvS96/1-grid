<?php

class cl_api
{
    public function __construct(){
        $this->url = 'https://api.github.com/repos/1-grid/GitIntegration/issues';
        $this->headers = [
            "Accept: application/vnd.github+json",
            "User-Agent: Coding",
            "Authorization: token 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"
        ];
    }

    public function get_api_data(){
        $curl = curl_init();

        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->url,
            CURLOPT_USERAGENT => '1-gridData',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => false
        ]);

        $api_reponse = curl_exec($curl);
        curl_close($curl);

        $data_reponse = json_decode($api_reponse);

        $display_data = "            
            <table class='table table-striped'>
                <tr class='thead-dark'>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Client</th>
                    <th>Priority</th>
                    <th>Type</th>
                    <th>Assigned to</th>
                    <th>Status</th>
                </tr>
            ";
        foreach ($data_reponse AS $data){
            foreach ($data->labels AS $sub_data){
                $description = (isset($sub_data->description)) ? $sub_data->description : '';
                if (str_starts_with($sub_data->name, 'C')) $client = str_replace("C: ", "", $sub_data->name);
                if (str_starts_with($sub_data->name, 'P')) $priority = str_replace("P: ", "", $sub_data->name);
                if (str_starts_with($sub_data->name, 'T')) $type = str_replace("T: ", "", $sub_data->name);
            }
            $number = (isset($data->number)) ? $data->number : '';
            $title = (isset($data->title)) ? $data->title : '';
            $assignee = (isset($data->assigne)) ? $data->assignee : '';
            $state = (isset($data->state)) ? $data->state : '';
            $display_data .= "
                <tr>
                    <td>{$number}</td>
                    <td>{$title}</td>
                    <td>{$description}</td>
                    <td>{$client}</td>
                    <td>{$priority}</td>
                    <td>{$type}</td>
                    <td>{$assignee}</td>
                    <td>{$state}</td>
                </tr>
            ";
        }
        $display_data .= "<table>";

        return $display_data;
    }

    public function add_api_data(){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_HTTPHEADER => $this->headers,
            CURLOPT_RETURNTRANSFER => true
        ]);

        # CURL INIT

        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($_POST));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        var_dump($data);

    }
}