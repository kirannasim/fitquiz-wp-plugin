<?php
class Fitquiz_api {

  function __construct() {
  		$this->api_url = get_option('fitquiz_url');
  	} // construct

    public function get_quiz_by_id($quiz_id, $border = null, $border_color = null, $border_size, $modal = false){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "{$this->api_url}/quiz",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "quiz_id={$quiz_id}&border={$border}&border_color={$border_color}&border_size={$border_size}&modal={$modal}",
          CURLOPT_HTTPHEADER => array(
          "Cache-Control: no-cache",
          "Content-Type: application/x-www-form-urlencoded",
          "Postman-Token: e48edaf3-1663-4f45-9443-8e2b264b7332"
        ),
      ));

      if (strpos($this->api_url, 'localhost') !== false) {
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8888",
        ));
      }

      $response = curl_exec($curl);

      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }

    }

  public function get_quiz_by_slug($quiz_slug){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/quiz",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "quiz_slug={$quiz_slug}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: e48edaf3-1663-4f45-9443-8e2b264b7332"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }



    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }

  }


  public function add_view($quiz_id,$extradata=null){
    $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "{$this->api_url}/add_quiz_view",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "quiz_id={$quiz_id}&extradata={$extradata}",
        CURLOPT_HTTPHEADER => array(
          "Cache-Control: no-cache",
          "Content-Type: application/x-www-form-urlencoded",
          "Postman-Token: 1bd0ae5b-ad6c-4081-a0b6-ab66f69069b2"
        ),
      ));

      if (strpos($this->api_url, 'localhost') !== false) {
        curl_setopt_array($curl, array(
          CURLOPT_PORT => "8888",
        ));
      }


      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        return "cURL Error #:" . $err;
      } else {
        return $response;
      }
  }

  public function quiz_question($view_id,$question_id){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/quiz_question",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "view_id={$view_id}&question_id={$question_id}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 417bccef-b652-4235-bec1-fe09c8a8f9b6"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }


public function quiz_retake($view_id){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/quiz_retake",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "view_id={$view_id}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 417bccef-b652-4235-bec1-fe09c8a8f9b6"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }
  public function quiz_start($view_id){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/quiz_start",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "view_id={$view_id}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 417bccef-b652-4235-bec1-fe09c8a8f9b6"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function quiz_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/quiz_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function quiz_track_calculator_submission($view_id){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/quiz_calculator_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "view_id={$view_id}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 417bccef-b652-4235-bec1-fe09c8a8f9b6"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }


  public function weight_calculate_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/weight_calculate_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function rental_property_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/rental_property_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function sep_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/sep_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function compound_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/compound_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function ira_submit($data){
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/ira_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }


  }
  public function restaurant_name_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/restaurant_name_generator",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function retirement_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/retirement_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function hard_money_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/hard_money_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }


  public function part_time_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/part_time_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }


  public function arm_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/arm_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }

  public function sba_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/sba_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }



  public function hfc_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/hfc_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d"
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }



  public function credit_submit($data){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$this->api_url}/credit_submit",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/json",
        "Postman-Token: 5a9be702-b7c3-4d41-9b50-fc99f9f9709d",
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }


  public function submit_calculator($data){
    // generate the url with the quiz slug

   
    parse_str($data, $array);
    $url = $this->api_url.str_replace('-', '_', $array['quiz_slug']);
    
    // echo $url;
    // die();

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "{$url}",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{$data}",
      CURLOPT_HTTPHEADER => array(
        "Cache-Control: no-cache",
        "Content-Type: application/x-www-form-urlencoded",
      ),
    ));

    if (strpos($this->api_url, 'localhost') !== false) {
      curl_setopt_array($curl, array(
        CURLOPT_PORT => "8888",
      ));
    }


    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return "cURL Error #:" . $err;
    } else {
      return $response;
    }
  }











}

?>
