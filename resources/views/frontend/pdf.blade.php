<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('front/images//icon.png') }}" />
    <link rel="stylesheet"
        href="{{ asset('front/css/bootstrap.rtl.min.css?version=' . config('app.app_version')) }})}}" />
    <link rel="stylesheet" href="{{ asset('front/css/main.css?version=' . config('app.app_version')) }})}}" />
    <link rel="stylesheet" href="{{ asset('front/css/media.css?version=' . config('app.app_version')) }})}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>المشعل للسفر والسياحة</title>
</head>
<div id="printd">

    <body>

        <div class="container-fluid wrapper">
            <div class="website-image">
                <img src="{{ asset('front/images//logo.png') }}" alt="Logo" />
            </div>
            <div class="table-name">
                <h2 class="table-title">معلومات أساسية</h2>
            </div>
            <div class="table-responsive responsive-table table1">
                <table class="table website-table">
                    <tbody>
                        <tr class="table-head">
                            <th scope="col" class="order-type">نوع العرض</th>
                            <td scope="col">{{ $booking->type_offer }}</td>
                        </tr>
                        <tr>
                            <th>الوجهة</th>
                            <td>{{ $booking->destination }}</td>
                            <th>الإسم</th>
                            <td> {{ $booking->name }}</td>
                            <th>الجوال</th>
                            <td>{{ $booking->phone }}</td>
                            <th>تاريخ الوصول</th>
                            <td>{{ $booking->date_of_arrival }}</td>
                        </tr>
                        <tr>
                            <th>عدد الليالي</th>
                            <td>{{ $booking->night_number }}</td>
                            <th>البالغين</th>
                            <td>{{ $booking->adult }}</td>
                            <th>الأطفال</th>
                            <td>{{ $booking->child }}</td>
                            <th>تاريخ المغادرة</th>
                            <td>{{ $booking->date_of_departure }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-name">
                <h2 class="table-title">الفنادق</h2>
            </div>
            <div class="table-responsive responsive-table">
                <table class="table website-table" cellspacing="4">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">المدينة</th>
                            <th scope="col">اسم الفندق</th>
                            <th scope="col">نوع الغرفة</th>
                            <th scope="col">عدد الليالي</th>
                            <th scope="col">الوجبات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking->hotels as $item)
                            <tr>
                                <td>{{ $item->city }}</td>
                                <td> {{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->night }}</td>
                                <td> {{ $item->eat }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="program-table-notes-table">
                <div class="program-table">
                    <div class="table-responsive">
                        <table class="table website-table" cellspacing="10">
                            <thead>
                                <tr class="table-head program-head">
                                    <th scope="col" colspan="2">البرنامج يشمل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking->detiles as $index => $hotel)
                                    <tr>
                                        @if ($loop->iteration % 2 != 0)
                                            <td>{{ $hotel->title }}</td>
                                            @if (@$booking->detiles[$index + 1]->title != null)
                                                <td>{{ $booking->detiles[$index + 1]->title }}</td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="notes-table">
                    <div class="table-responsive responsive-table">
                        <table class="table website-table" cellspacing="10">
                            <thead>
                                <tr class="table-head program-head">
                                    <th scope="col" colspan="2">ملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking->notes as $index => $note)
                                    <tr>
                                        @if ($loop->iteration % 2 != 0)
                                            <td>{{ $note->title }}</td>
                                            @if (@$booking->notes[$index + 1]->title != null)
                                                <td>{{ $booking->notes[$index + 1]->title }}</td>
                                            @endif
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @if($booking->show_arraive == 1)
            <div class="table-name">
                <h2 class="table-title">خط سير الرحلة</h2>
            </div>
            <div class="table-responsive responsive-table">
                <table class="table website-table" cellspacing="4">
                    <thead>
                        <tr class="table-head">
                            <th scope="col" style="width: 70px">اليوم</th>
                            <th scope="col">البرامج</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking->arrives->where('check', 1) as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="program-table-td">
                                    {{ $item->title }}
                                </td>
                            </tr>
                        @endforeach
    
                    </tbody>
                </table>
            </div>
            @endif
            <div class="footer">
                <div class="tax">
                    <div class="tax-box blue-box">
                        <h2 style="font-size: 16px">إجمالي السعر شامل الضريبة والخدمات</h2>
                    </div>
                    <div class="whatsapp">
                        <span>966532223023+</span>
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                </div>
                <div class="price">
                    <div class="tax-box red-box">
                        <h2 style="font-size: 16px">{{ $booking->price }} ريال سعودي</h2>
                    </div>
                    <div class="other-social">
                        <span>ALMESHAL_TOUR</span>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-snapchat"></i>
                    </div>

                </div>
                <img src="{{ asset('front/images//segnature.png') }}" alt="Signature" />
            </div>
        </div>
        <style>
            @media print {
                @page {
                    size: A2;
                }
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script src="{{ asset('front/js/bootstrap.min.js?version=' . config('app.app_version')) }})}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>


        <script src="{{ asset('front/js/html2pdf.bundle.min.js?version=' . config('app.app_version')) }})}}"></script>

        <script>
            $(document).ready(function() {
                generatePDF();
                // window.print()
            });

            function generatePDF() {
                // Choose the element that our invoice is rendered in.
                const element = document.getElementById('printd');

                // Define the PDF options, including the page size.
                const options = {
                    filename: 'invoice.pdf', // Specify the desired filename.
                    jsPDF: {
                        format: 'a2'
                    }, // Set the page size to A2.
                };

                // Generate the PDF with the specified options and save it for the user.
                html2pdf().set(options).from(element).save();
            }
        </script>
    </body>
</div>

</html>
