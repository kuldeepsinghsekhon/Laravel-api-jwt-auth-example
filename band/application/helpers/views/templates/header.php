<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>MARIACHI TIERRAAZTECA</title>
      <link rel="stylesheet" href="<?=base_url()?>assets/style.css">
      
      <!-- jQuery library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>

      <!-- jquery.redirecr.js -->
      <script src="<?=base_url('assets/jquery.redirect.js')?>"></script>

     <!-- pace.js -->
     <!-- <script src="<=base_url('assets/pacejs/pace.js')?>"></script>
     <link href="<=base_url('assets/pacejs/loading_bar.css')?>" rel="stylesheet" type="text/css"> -->

      <!-- ckeditor script -->
      <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

      <!-- parsley.js for form validation -->
      <script src="https://parsleyjs.org/dist/parsley.min.js"></script>

      <!-- bootstrap multi level navbar -->
      <link href="<?=base_url()?>assets/bootstrap_multi_level_menu/css/bootnavbar.css" rel="stylesheet">
      <script src="<?=base_url()?>assets/bootstrap_multi_level_menu/js/bootnavbar.js"></script>

      <!-- bootstrap date picker https://cdnjs.com/libraries/bootstrap-datepicker-->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
      <link rel="stylesheet" href="<?=base_url('assets/datepicker/bootstrap-datepicker.min.css')?>">
      <script src="<?=base_url('assets/datepicker/bootstrap-datepicker.min.js')?>"></script>
      <script src="<?=base_url('assets/datepicker/bootstrap-datepicker.en-CA.min.js')?>"></script>
      
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


     
   </head>

   <body>

<style>
  .top_head{background:#490411;}
    .top_head h1 {
      text-align: center;
      font-size: 6rem;
      letter-spacing: 23px;
      font-weight: 600;
      color: #ffbf4d;
      line-height: 62px;
      margin: 0;
    }

    .img_dv {
      width: 33%;
      display: inline-block;
      text-align: center;
    }

    .top_head h1 span {
      font-size: 3.5rem;
    }

    .img_dv.rgt {
      text-align: right;
      position: relative;
      bottom: 42px;
    }
    .img_dv.lft {
      text-align: left;
      position: relative;
      bottom: 42px;
    }

    .img_dv.mid {
      position: relative;
      bottom: 14px;
    }
    .Desired {
      text-align: center;
      margin-bottom: 1.5rem;
      margin-top: 4rem;
    }
    .Desired h1 {
      text-align: center;
      color: #3e040c;
      font-size: 33px;
      font-weight: 600;
      margin: 0;
    }
    .Desired span {
      color: #E21C21;
      text-align: center;
      font-size: 16px;
      font-weight: normal;
    }

    .price_sec ul li p, span {
      color: #fff;
      font-size: 25px;
      font-weight: bold;
      margin: 0;
    }
    .Popular {
      line-height: 2.3em;
    }
    .price_sec ul li:hover {
      background: rgba(209, 209, 209, 0.39);
    }
    .Popular {
      margin-top: -15px !important;
      z-index: 99;
      position: relative;
    }
    .price_sec {
      margin-top: 2rem;
      width: 85%;
      margin: auto;
      position: relative;
    }
    .social_icon.si a {
      color: #000;
    }
    .content-over-img.img-2 {
      top: -151px;
      right: -76px;
    }
    .content-over-img.img-1 {
      left: -135px;
      top: -42px;
    }
    .social_icon {
      text-align: center;
      margin-top: 4rem;
    }
    .content-over-img {
      position: absolute;
      top: 0;
    }
    .social_icon a {
      font-size: 23px;
      padding: 10px;
      color: #fff;
    }
    .price_sec ul {
      width: 33%;
      display: inline-block;
      margin: 0;
      padding: 0;
      border-radius: 5px;
      box-shadow: inset 0 1px 0 rgba(255,255,255,0.07), 0 0 2px 2px rgba(0,0,0,0.3);
      background: url(../images/bg.png) repeat #202020;
      vertical-align: top;
      margin-left: -5px;
    }
    .price_sec ul li {
      list-style-type: none;
      text-align: center;
    }
    .price_sec ul li {
      list-style-type: none;
      text-align: center;
      padding: 15px;
      cursor: pointer;

    }
    .copyright_sec p {
      color: #fff;
      text-align: center;
      margin-top: 2rem;
    }
    .footer {
      background: #490411;
      padding: 5rem 0 2rem 0;
      margin-top: 5rem;
    }


    .lowest li:first-child {
      background:#47abe6;
      background:-moz-linear-gradient(top, #47abe6 0%, #3995e2 100%);
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#47abe6), color-stop(100%,#3995e2));
    }



    .Popular li:first-child {
      background: #ed5837;
      background:-webkit-gradient(linear, left top, left bottom, color-stop(0%,#ed5837), color-stop(100%,#e8482e));
      
    }



    .Premium li:first-child {
      background:#47abe6;
      background:-moz-linear-gradient(top, #47abe6 0%, #3995e2 100%);
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#47abe6), color-stop(100%,#3995e2));
    }

    .yellow {
      color: rgb(255, 255, 0);
      font-weight: normal;
      font-size: 15px;
    }

    .green {
      color: rgb(7, 234, 8);
      font-weight: normal;
      font-size: 15px;
    }
    .orange{
      color: rgb(175, 83, 6);
      font-weight: normal;
      font-size: 15px;
    }

    @media only screen and (max-width: 767px) {
      
    .price_sec ul {
      width: 100%;
      
    }
    .left_right_imges {
      display: none;
    } 
    .img_dv {
      width: 100%;
      
    }   
}
</style>

<!--start header -->
    <div class="top_head">
         <h1><span>MARIACHI</span><br>TIERRAAZTECA</h1>
         <div class="btm_head">
            <div class="img_dv lft">
               <img src="<?=base_url()?>assets/root_folder/images/Mountain no bg flip.png">
            </div>
            <div class="img_dv mid">
               <img src="<?=base_url()?>assets/root_folder/images/4.png">
            </div>
            <div class="img_dv rgt">
               <img src="<?=base_url()?>assets/root_folder/images/Mountain no bg.png">
            </div>
         </div>
      </div>
  <!--end header -->

<div id="loading">
  <img id="loading-image" src="<?=base_url()?>assets/images/ajax-loader.gif" alt="Loading..." />
</div>

    <div class="main_section mt-3">
         <?php
             if($flash_msg = $this->session->flashdata('database_error'))
                echo '<h5 class="alert alert-danger text-center">'.$flash_msg.'</h5>';
         ?>   
