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
                $descriptions = $sub_data->description;
                if (str_starts_with($sub_data->name, 'C')) $clients = str_replace("C: ", "", $sub_data->name);
                if (str_starts_with($sub_data->name, 'P')) $priorities = str_replace("P: ", "", $sub_data->name);
                if (str_starts_with($sub_data->name, 'T')) $types = str_replace("T: ", "", $sub_data->name);
            }
            $description = (isset($descriptions)) ? $descriptions : '';
            $client = (isset($clients)) ? $clients : '';
            $priority = (isset($priorities)) ? $priorities : '';
            $type = (isset($types)) ? $types : '';
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

    public function add_api_data($number, $title, $description, $client, $priority, $type, $assignee, $status){
        $data = array(
            "number" => $number,
            "title" => $title,
            "labels" => array(
                "description" => $description,
                "client" => $client,
                "priority" => $priority,
                "type" => $type,
            ),
            "assignee" => $assignee,
            "status" => $status
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_URL, $this->url);

        $result = curl_exec($ch);

        var_dump($result);

        curl_close($ch);

    }
}