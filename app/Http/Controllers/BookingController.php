<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookingArraive;
use App\Models\BookingDetiels;
use App\Models\BookingNote;
use App\Models\Hotel;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.booking.index')->with('bookings',Booking::orderby('id','desc')->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->type_offer = $request->type_offer;
        $booking->destination = $request->destination;
        $booking->name = $request->name;
        $booking->phone = $request->phone;
        $booking->date_of_arrival = $request->date_of_arrival;
        $booking->night_number = $request->night_number;
        $booking->adult = $request->adult;
        $booking->child = $request->child;
        $booking->date_of_departure = $request->date_of_departure;
        $booking->price = $request->price;
        if($request->check_Bok){
            $booking->show_arraive = 1;
        }else{
            $booking->show_arraive = 0;
        }
        $booking->code = date('Ymd-His').rand(10,99);
        $booking->save();
        if(isset($request->hotel)){
            foreach($request->hotel as $hotel){
                if($hotel == null){
                    continue;
                }
                $hotell = new Hotel();
                $hotell->city = $hotel['city'];
                $hotell->name = $hotel['name'];
                $hotell->type = $hotel['type'];
                $hotell->night = $hotel['night'];
                $hotell->eat = $hotel['eat'];

                $hotell->booking_id = $booking->id;
                $hotell->save();
            }
        }
        if(isset($request->note)){
            foreach($request->note as $note){
                if($note['title'] == null){
                    continue;
                }
                $notee = new BookingNote();
                $notee->title = $note['title'];
                $notee->booking_id = $booking->id;
                $notee->save();
            }
        }
        if(isset($request->detiles)){
            foreach($request->detiles as $detiles){
                if($detiles['title'] == null){
                    continue;
                }
                $dee = new BookingDetiels();
                $dee->title = $detiles['title'];
                $dee->booking_id = $booking->id;
                $dee->save();
            }
        }
        if(isset($request->arraive)){
            foreach($request->arraive as $arraive){
                if($arraive['title'] == null){
                    continue;
                }
                $arraivee = new BookingArraive();
                $arraivee->title = $arraive['title'];
                $arraivee->check = $arraive['check'];
                $arraivee->booking_id = $booking->id;
                $arraivee->save();
            }
        }
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $booking=Booking::where('code',$code)->first();
        return view('frontend.show')->with('booking',$booking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function pdf($booking){
        $booking=Booking::where('code',$booking)->first();
        return view('frontend.pdf')->with('booking',$booking);
    }
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with(['success'=>'نم حذف الحجز ']);
    }
}
