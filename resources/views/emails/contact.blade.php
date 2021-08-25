<div style="width:95%; margin:50px auto;padding-left:5%;">
<div style="display:flex; align-items:center">
        <!-- <img src="{{config('app.url')}}/img/logo.svg" alt=""> -->
        <div style="width:320px;">
            <img src="{{config('app.url')}}/img/logo.png" alt="" style="width: 100%;display: inline-block;">
        </div>
        <div style="margin-left:auto;display: flex;margin-top:45px;">
        <a href="{{settings('site.instagram')}}" style="margin-right:20px;width:29px;height:29px;"><img style="width:29px;height:29px;"  src="{{config('app.url')}}/img/instagram(2).png"
                    alt=""></a>
            <a href="{{settings('site.facebook')}}" style="margin-right:20px;width:29px;height:29px;"><img style="width:29px;height:29px;" src="{{config('app.url')}}/img/facebook(2).png"
                    alt=""></a>
            <a href="{{settings('site.twitter')}}" style="margin-right:20px;width:29px;height:29px;"><img style="width:29px;height:29px;" src="{{config('app.url')}}/img/twitter(2).png"
                    alt=""></a>
            <a href="{{settings('site.linkedin')}}" style="margin-right:20px;width:29px;height:29px;"><img style="width:29px;height:29px;" src="{{config('app.url')}}/img/linkedin(2).png"
                    alt=""></a>
            <a href="{{settings('site.youtube')}}" style="margin-right:20px;width:29px;height:29px;"><img style="width:29px;height:29px;" src="{{config('app.url')}}/img/youtube(2).png"
                    alt=""></a>
        </div>
    </div>
    <div style="border:1px solid #CBCBCB; margin-bottom:20px;margin-top:20px;"></div>
    <h1 style="margin-bottom:0px;color:black;">Buna,</h1>
    <h2 style="margin-top:0px;color:black;"> Neoclinique</h2>
    <p style="color:#7E7E7E;font-size:16px;">Ai primit un mesaj de la  <?php echo $data['nume']; ?>.</p>
    <div style="display:flex;">
        <p style="color:#1C92D1;font-weight:bold;margin-bottom:0px;margin-top:0px;margin-right:5px;font-size:16px;">Telefon: </p>          
        <p style="color:#7E7E7E;margin-bottom:0px;margin-top:0px;font-size:16px;"> <?php echo $data['telefon'];?> </p>
    </div>
    <div style="display:flex;">
        <p style="color:#1C92D1;font-weight:bold;margin-bottom:0px;margin-top:0px;margin-right:5px;font-size:16px;">Adresa de email:</p>
        <p style="color:#7E7E7E;margin-bottom:0px;margin-top:0px;font-size:16px;"> <?php echo $data['email'];?></p>
    </div>
    <div style="display:flex;">
        <p style="color:#1C92D1;font-weight:bold;margin-bottom:0px;margin-top:0px;margin-right:5px;font-size:16px;">Medic: </p>          
        <p style="color:#7E7E7E;margin-bottom:0px;margin-top:0px;font-size:16px;"> <?php echo $data['medic'];?> </p>
    </div>
    <div style="display:flex;">
        <p style="color:#1C92D1;font-weight:bold;margin-bottom:0px;margin-top:0px;margin-right:5px;font-size:16px;">Este client Neoclinique: </p>          
        <p style="color:#7E7E7E;margin-bottom:0px;margin-top:0px;font-size:16px;">@if($data['client']) Da @else Nu @endif</p>
    </div>
    <div style="display:flex;">
        <p style="color:#1C92D1;font-weight:bold;margin-bottom:0px;margin-top:0px;margin-right:5px;font-size:16px;">Exista radiografie? </p>          
        <p style="color:#7E7E7E;margin-bottom:0px;margin-top:0px;font-size:16px;">@if($data['radiography']) Da @else Nu @endif</p>
    </div>
   <div style="display:flex;">
        <p style="color:#1C92D1;font-weight:bold;margin-bottom:0px;margin-top:0px;margin-right:5px;font-size:16px;">Mesaj: </p>
        <p style="color:#7E7E7E;margin-bottom:0px;margin-top:0px;font-size:16px;"> <?php echo $data['mesaj']; ?></p>
   </div>

   <div style="border:1px solid #CBCBCB; margin-bottom:20px;margin-top:20px;"></div>
   <div style="display:flex;">
        <div style="display:block;margin-right:15%;">
            <h4 style="margin-bottom:0px; color:#2E2C2C;">Email programari</h4>
            <p style="margin-top:5px;color:#2E2C2C;">office@neoclinique.ro</p>
        </div>
        <div style="display:block;margin-right:15%;">
            <h4 style="margin-bottom:0px; color:#2E2C2C;">Telefon programari</h4>
            <p style="margin-top:5px;color:#2E2C2C;">+4 0371 000 111</p>
        </div>
        <div style="display:block;">
            <h4 style="margin-bottom:0px; color:#2E2C2C;">Email programari</h4>
            <p style="margin-top:5px;color:#2E2C2C;margin-bottom:0px;">Str. Th. Sperantia 14, et 1, SECTOR 3, Clinica
                Militari</p>
            <p style="margin-top:0px;color:#2E2C2C;">Str. Rosia Montana 6, SECTOR 6, Bucuresti</p>
        </div>
    </div>
    <div style="border:1px solid #CBCBCB; margin-bottom:20px;margin-top:20px;"></div>
    <div style="display:inline-block;width:100%;">
        <div style="width:320px;display: inline-block;vertical-align: middle;margin-top: 25px;">
            <img src="{{config('app.url')}}/img/logo.png" alt="" style="width: 100%;display: inline-block;">
        </div>
        <div style="width:100%;display: inline-block;vertical-align: middle;margin-top: 25px;">
            <p style="color:#7E7E7E;font-size:14px;margin-bottom:0px;margin-top:30px;">Neoclinique este operator de date cu caracter personal inregistrat la
                A.N.S.P.D.C.P. cu nr. 27725 si 27724 in Registrul de Evidenta P.D.C.P.</p>
                <p style="color:#7E7E7E;font-size:15px;margin-top:0px">
                Copyright 2020 Neoclinique. All rights reserved. 
                </p>
        </div>
    </div>
</div>
