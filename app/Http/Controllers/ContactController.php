<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinica;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Echipa;
use Validator;

class ContactController extends Controller
{
    public function index(){

        $clinici = Clinica::get();
        $echipa = Echipa::where('activ',1)->get();
        $clinici = $clinici->translate(\App::getLocale(), 'ro');

        return view("contact", ["clinici"=>$clinici,'echipa'=>$echipa]);
    }


    // Trimite email contact
    public function trimite_contact(Request $request)
    {
        $form_data = $request->only('nume','telefon','mesaj','email','medic','client','radiography');

        $nume    = $form_data['nume'];
        $telefon = $form_data['telefon'];
        $mesaj   = $form_data['mesaj'];
        $email   = $form_data['email'];
        $medic   = $form_data['medic'];
        $client  = $form_data['client'];
        $radiography = $form_data['radiography'];

        $validationRules = [
            'nume'    => ['required','min:6'],
            'telefon' => ['required','min:6'],
            'mesaj'   => ['required','min:10'],
            'email'   => ['required','email'],
            'medic'   => ['required'],
         ];   

         $validationMessages =
         [
             'nume_newsletter.required'  => "Numele Este Obligatoriu!",
             'nume_newsletter.min'       => "Numele trebuie sa aiba minim 6 caractere",
             'telefon.required'          => "Numarul de telefon este obligatouriu!",
             'telefon.min'               => "Formatul numarul de telefonu nu este corect",
             'mesaj.required'            => "Campul mesaj este obligatoriu",
             'mesaj.min'                 => "Mesajul trebuie sa fie de minim 10 caractere",
             'email.required'            => "Adresa de email este obligatorie",
             'email.email'               => 'Adresa de email nu este valida!',
             'medic.required'            =>'Te rugam sa selectezi un medic la care doresti sa iti faci o rezervare',
         ];
         $document = null;
        if($request->file('radiography')){ 
            $document = Input::file('radiography');
            
            if ($document->getError() == 1) {
                    $max_size = $document->getMaxFileSize() / 15 / 15;  // Get size in Mb
                    $error = 'Radiografia trebuie sa fie mai mica decat ' . $max_size . 'Mb.';
                    return ['success' => false, 'msg' => $error];  
                }
                
                if ($document->getClientMimeType() !== 'application/pdf')
                {
                return ['success' => false, 'msg' => 'Va rugam sa incarcati un fisier de tip pdf!'];  
                }
        }

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
                Mail::to(settings('site.email'))->send(new Contact(['nume' => $nume,'telefon' => $telefon,'email'=>$email,'mesaj'=>$mesaj,'medic'=>$medic,'client'=>$client,'radiography'=>$request->file('radiography'),]));
                return
                [
                    'success' => true,
                    'code'    => 200,
                    'msg'     => 'Mesaj trimis. Va multumim!'
                ];
             }         
     }

}
