<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serviciu;
use App\Oferta;
use App\Testimonial;
use App\CardInformatii;
use Validator;
use App\Rezervation;
use Illuminate\Support\Facades\Mail;
use App\Mail\TrimiteRezervare;
use App\Mail\TrimiteTarif;
use App\Newsletter;
use App\Caz;
use App\Mail\RezervareClient;
use App\Info;

class HomeController extends Controller
{
    public function index(){
        $servicii = Serviciu::get();
        $servicii = $servicii->translate(\App::getLocale(), 'ro');
        $oferte = Oferta::where('home', '=', 1)->where('activ', '=', 1)->get();

        $testimoniale = Testimonial::get();
        $testimoniale = $testimoniale->translate(\App::getLocale(), 'ro');

        $card = CardInformatii::where('descriere', 'LIKE', '%card home%')->get();
        $card = $card->translate(\App::getLocale(), 'ro');

        // dd($oferte->toArray());

        $oferte = $oferte->translate(\App::getLocale(), 'ro');

        $informatii = Info::withTranslations()->get()->translate(\App::getLocale(), 'ro');
        

        return view("home", 
        [
            "servicii"=>$servicii, 
            "oferte"=>$oferte, 
            'testimoniale'=>$testimoniale, 
            'card'=>$card,
            'informatii'=>$informatii
            ]);
    }


    /*
        * trimite rezervare. 
        * parametrii sunt luati de pe formularul homepage.
    */

    public function trimite_rezervare(Request $request)
    {
        $form_data = $request->only('nume','prenume','telefon','interesat','data_i','ora','mesaj','email','persoana');

        $nume      = $form_data['nume'];
        $prenume   = $form_data['prenume'];
        $telefon   = $form_data['telefon'];
        $interesat = $form_data['interesat'];
        $data_i    = $form_data['data_i'];
        $ora       = $form_data['ora'];
        $mesaj     = $form_data['mesaj'];
        $email     = $form_data['email'];
        $medic     = $form_data['persoana'];
        $nume_complet = $nume . ' ' . $prenume;

        $validationRules = [
            'nume'    => ['required','min:3'],
            'prenume' => ['required','min:3'],
            'telefon' => ['required','min:10']
         ];    

         $validationMessages =
          [
            'nume.required'    => "Numele Este Obligatoriu!",
            'nume.min'         => "Numele trebuie sa aiba minim 6 caractere",
            'prenume.required' => "Prenumele Este Obligatoriu!",
            'prenume.min'      => "Prenumele trebuie sa aiba minim 6 caractere",
            'telefon.required' => "Telefonul Este Obligatoriu!",
            'telefon.min'      => 'Numarul de telefon trebuie sa aiba 10 caractere'
         ];

         $validator = Validator::make($form_data, $validationRules,$validationMessages);

         if ($validator->fails())
         {
            return ['success' => false, 'msg' => $validator->errors()->toArray(),'code' => 300]; 
         }
         else   
         {

            $new_insert = new Rezervation();
            $new_insert->nume           = $nume_complet;
            $new_insert->telefon        = $telefon;
            $new_insert->interesat_de   = $interesat;
            $new_insert->data_rezervare = $data_i;
            $new_insert->ora_rezervare  = $ora;
            $new_insert->mesaj          = $mesaj;
            $new_insert->medic          =$medic;
            $new_insert->aprobat        = 'pending';

            $new_insert->save();

            Mail::to(settings('site.email'))->send(new TrimiteRezervare(['email'=>$email,'mesaj'=>$mesaj,'nume' => $nume,'prenume'=>$prenume,'telefon' => $telefon,'interesat'=>$interesat,'data_rezervare'=>$data_i,'ora_rezervare'=>$ora,'medic'=>$medic]));
            Mail::to($email)->send(new RezervareClient(['email'=>$email,'mesaj'=>$mesaj,'nume' =>$nume,'prenume'=>$prenume,'telefon' => $telefon,'interesat'=>$interesat,'data_rezervare'=>$data_i,'ora_rezervare'=>$ora,'medic'=>$medic]));

             return
             [
                 'code' => 200,
                 'msg'  => 'Rezervare facuta succes'
             ];
         }
        
    }

    public function trimite_tarif(Request $request)
    {
        $form_data = $request->only('nume','prenume','telefon','tarif','data_i','ora','mesaj','email','tarif');

        $nume      = $form_data['nume'];
        $prenume   = $form_data['prenume'];
        $telefon   = $form_data['telefon'];
        $tarif = $form_data['tarif'];
        $data_i    = $form_data['data_i'];
        $ora       = $form_data['ora'];
        $mesaj     = $form_data['mesaj'];
        $email     = $form_data['email'];
        $nume_complet = $nume . ' ' . $prenume;

        $validationRules = [
            'nume'    => ['required','min:3'],
            'prenume' => ['required','min:3'],
            'telefon' => ['required','min:10']
         ];    

         $validationMessages =
          [
            'nume.required'    => "Numele Este Obligatoriu!",
            'nume.min'         => "Numele trebuie sa aiba minim 6 caractere",
            'prenume.required' => "Prenumele Este Obligatoriu!",
            'prenume.min'      => "Prenumele trebuie sa aiba minim 6 caractere",
            'telefon.required' => "Telefonul Este Obligatoriu!",
            'telefon.min'      => 'Numarul de telefon trebuie sa aiba 10 caractere'
         ];

         $validator = Validator::make($form_data, $validationRules,$validationMessages);

         if ($validator->fails())
         {
            return ['success' => false, 'msg' => $validator->errors()->toArray(),'code' => 300]; 
         }
         else   
         {

            $new_insert = new Rezervation();
            $new_insert->nume           = $nume_complet;
            $new_insert->telefon        = $telefon;
            $new_insert->data_rezervare = $data_i;
            $new_insert->ora_rezervare  = $ora;
            $new_insert->mesaj          = $mesaj;
            $new_insert->aprobat        = 'pending';

            $new_insert->save();

            Mail::to(settings('site.email'))->send(new TrimiteTarif(['email'=>$email,'mesaj'=>$mesaj,'nume' => $nume,'prenume'=>$prenume,'telefon' => $telefon,'tarif'=>$tarif,'data_rezervare'=>$data_i,'ora_rezervare'=>$ora,'tarif'=>$tarif]));

             return
             [
                 'code' => 200,
                 'msg'  => 'Rezervare facuta succes'
             ];
         }
        
    }


    /*

    */
    public function inregistrare_newsletter(Request $request)
    {
        $form_data        = $request->only('nume_newsletter','email_newsletter');
        $nume_newsletter  = $form_data['nume_newsletter'];
        $email_newsletter = $form_data['email_newsletter'];

        $check = Newsletter::where('email','=',$email_newsletter)->get();
        if(count($check) == '0')
        {       
            $validationRules = [
                'nume_newsletter'  => ['required','min:6'],
                'email_newsletter' => ['required','min:6','email'],
             ]; 

             $validationMessages =
            [
                'nume_newsletter.required'  => "Numele Este Obligatoriu!",
                'nume_newsletter.min'       => "Numele trebuie sa aiba minim 6 caractere",
                'email_newsletter.required' => "Adresa de email este Obligatorie!",
                'email_newsletter.min'      => "Adresa de email trebuie sa aiba minim 6 caractere",
                'email_newsletter.email'    => 'Adresa de email nu este valida'
            ];

             $validator = Validator::make($form_data, $validationRules,$validationMessages);

             if ($validator->fails())
             {
                return 
                [
                    'success' => false, 
                    'msg'     => $validator->errors()->toArray(),
                    'code'    => 300
                ]; 
             }
             else
             {
                $insert = new Newsletter();
                $insert->email = $email_newsletter;
                $insert->name  = $nume_newsletter;
                
                $insert->save();
                return
                [
                    'success' => true,
                    'code'    => 200,
                    'msg'     => 'Inscris cu succes!'
                ];
             }
        }
        else
        {
            return
            [
                'code'     => 400,
                'success'  => false, 
                'msg'      => 'Aceasta adresa a mai fost folosita.'
            ];
        }
    }

    public function search($slug)
    {

        $servicii = Serviciu::where('nume','like','%'.$slug.'%')->orWhere('descriere','like','%'.$slug.'%')->get();
        $oferte   = Oferta::where('titlu','like','%'.$slug.'%')->orWhere('descriere','like','%'.$slug.'%')->get();
        $cazuri   = Caz::where('titlu','like','%'.$slug.'%')->orWhere('descriere','like','%'.$slug.'%')->get();

        return view("search",
        [
            'cautare'  => $slug,
            'servicii' => $servicii,
            'oferte'   => $oferte,
            'cazuri'   => $cazuri
        ]
    );
    }

    
}
