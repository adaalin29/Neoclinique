@extends('parts.template')

@section('title', 'Cautare')

@section('content')

<div id="search_page">
    <div class="container pt-5">
        <!-- <div class="container container-articles">
            <div class="grid-sizer"></div>
            <div class="gutter-sizer"></div> -->
            <?php
                    /* aici returnam cautarile:
                     ** pui div-urile in fiecare foreach
                     **
                     */
                     
                     if(count($servicii) == 0 && count($oferte) == 0 && count($cazuri) == 0)
                     {
                        ?>
                            <h5 class="mb15">
                                Nu au fost gasit rezultate pentru <?php echo $cautare;?>.
                            </h5>
                        <?php
                     }
                     else
                     {
                         ?>
                            <div class="row">
                                        <div class="col-md-12">
                                        
                                            <h5>
                                                Rezultatul cautarii pentru:
                                                <?php
                                                        // cuvantul pe care il cauta utilizatorul
                                                        echo $cautare;
                                                    ?>
                                            </h5>
                                        </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                            <div class="container container-articles">
                            <div class="grid-sizer"></div>
                            <div class="gutter-sizer"></div>
                         <?php

if(count($servicii) > 0)  // verificam daca avem date
{
       foreach($servicii as $serviciu) // luam fiecare serviciu in parte
       {
           $img = json_decode($serviciu->imagini);
           ?>
           <a class="item" href="/servicii/<?php echo $serviciu->slug;?>">
                   <img src="{{Voyager::image($img[0])}}"  alt="ceva" />
               <p style="font-weight:bold">
                   <?php
                       echo $serviciu->nume; // numele serviciului
                   ?>
               </p>
               <p>
                   <?php
                       echo $serviciu->descriere; // descrierea serviciului
                   ?>
               </p>
           </a>
           <?php
       }
   }

   if(count($oferte) > 0)
   {
       foreach($oferte as $oferta)
       {
           $img2 = json_decode($oferta->imagini);
           ?>
               <a class="item" href="/oferte/<?php echo $oferta->slug;?>">
                       <img src="{{Voyager::image($img2[0])}}"  alt="ceva" />

                   <p style="font-weight:bold">
                       <?php
                           echo $oferta->titlu; // numele ofertei
                       ?>
                   </p>
                   <p>
                       <?php echo  $oferta->descriere; // descrierea ofertei ?>
                       </p>
                     
               </a>
           <?php
       }
   }
     
       foreach($cazuri as $caz)
           {
               $img3 = json_decode($caz->imagini);
              ?>
               <a class="item" href="/cazuri/<?php echo $caz->slug;?>">
               <img src="{{Voyager::image($img3[0])}}" alt="ceva" />

                   <p style="font-weight:bold">
                       <?php echo $caz->titlu; // numele ofertei ?>
                   </p>
                   <p>
                       <?php echo  $caz->descriere; // descrierea ofertei ?>
                   </p>
                
               </a>
               <?php
           }


                     }

                   

                ?>


        </div><!-- /.container -->
    </div> <!-- /.search_page -->

    @endsection