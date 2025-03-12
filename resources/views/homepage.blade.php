@extends('master')

@section('body')
    
<div id="default-carousel" class="relative w-full z-10" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-70 md:h-132 overflow-hidden">
         <!-- Item 1 -->
        <div id="carousel-item-1" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/pic1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div id="carousel-item-2" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/pic2.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div id="carousel-item-3" class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset('img/pic3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
</div>
<div class="pb-25 px-10 md:px-20" style="background-color: #B1D4E0">
    <div class="text-xl md:text-3xl text-center font-bold pt-4 pb-15">
        SUPREME COURT UPHOLDS CAPPI REVISED REHABILITATION <br>
        PLAN AND REFERS CASE TO THE REHABILITATION <br>
        (RTC MAKATI BRANCH 148)
    </div>
    <div class="text-lg text-center font-medium text-justify">
        &nbsp; The Supreme Court has lifted the Temporary Restraining Order on 
        the Revised Rehabilitation Plan of College Assurance Plan Philippines, Inc. 
        (“CAPPI”) and remanded the case to the Rehabilitation Court (RTC Makati Branch 148) 
        for its supervision over the implementation of such Plan. This would necessarily 
        include updating and scheduling of benefits payments after the legal challenge of the 
        Insurance Commission and the Securities and Exchange Commission has been resolved in CAPPI’s favor.  
        <br><br>
        &nbsp;   In an Order dated 19 May 2022, the Rehabilitation Court granted the Receiver and CAPPI a period of 
        sixty (60) days, or until 18 July 2022, to arrange the logistics of the release of the partial payments
        to CAPPI planholders. The Receiver and CAPPI were further directed to release the first partial 
        payments over a period of six (6) months from 20 July 2022 to 20 January 2023.  
        <br><br>
        The salient features of the Revised Rehabilitation Plan are as follows:
        <br><br>
        <div class="ps-10">
            <li>
                CAPPI is to continue paying its planholders at least fifty percent (50%) of the gross contract 
                prices of their respective plans within ten (10) years, and even more thereafter as more funds 
                are generated.
            </li>
            <br>
            <li>
                To achieve this, CAPPI is allowed to generate income from its existing real properties all over 
                the Philippines by entering into joint-venture agreements with property developers for the 
                development and/or lease of said assets.
            </li>
            <br>
            <li>
                CAPPI will also generate income through the sale of its other assets and from its existing investments.
            </li>
            <br>
            <li>
                By utilizing and maximizing the revenue potential of these existing assets, CAPPI expects to grow the value 
                of said assets by PhP6 Billion in ten (10) years, and generate almost PhP6 Billion in the following 
                fifteen (15) years.
            </li>
            <br><br>
        </div>
        &nbsp; To implement the 2012 Revised Rehabilitation Plan in an orderly and equitable manner, CAPPI will indicate in its 
        website, <i>www.capphil.com</i>, the dates when the checks will be available, the CAPPI Servicing Office which will release 
        said checks, as well as the requirements and procedure for the release of the first partial payments to CAPPI planholders.
        <br><br>
        
        &nbsp;   For inquiries, CAPPI planholders may visit the following CAPPI Servicing Offices, and present copies of 
        their Certificate of Full Payment (“CFP”): Makati head office (for all plans regardless of the place of purchase), 
        San Fernando – La Union (for plans purchased in Region I), Tuguegarao (for plans purchased in Region II), Angeles City 
        (for plans purchased in Region III), Batangas City (for plans purchased in Region IV), Lucena City (for plans purchased 
        in Region V), Iloilo City (for plans purchased in Region VI exept Bacolod City), Bacolod City (for plans purchased 
        in Bacolod City), Cebu City (for plans purchased in Region VII), Tacloban City (for plans purchased in Region VIII), 
        Zamboanga City (for plans purchased in Region IX), Cagayan De Oro City (for plans purchased in Region X), Davao City 
        (for plans purchased in Region XI), and General Santos City (for plans purchased in Region XII).
        <br><br><br><br>
        
        <b>REQUIREMENTS FOR CLAIMING THE CHECK:</b>
        <br><br>
        1. Request for Release of Check <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/Request for Release of Check.pdf') }}" target="_blank">(click here to download)</a>
        <br>
        2. Original Certificate of Full Payment (CFP)
        <br>
        3. Two(2) valid government-issued ID
        <br><br>
        <b>OTHER RELATED FORMS:</b>
        <br><br>
        Request for Change of Payee <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/Request for Change of Payee.pdf') }}" target="_blank">(click here to download)</a>
        <br>
        Request for Transfer of Check <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/Request for Transfer of Check.pdf') }}" target="_blank">(click here to download)</a>
        <br>
        Special Power of Attorney to Release and Negotiate Check <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/SPA to Release and Negotiate Check.pdf') }}" target="_blank">(click here to download)</a>
        <br>
        Request to Deposit Check <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/Request to Deposit Check.pdf') }}" target="_blank">(click here to download)</a>
        <br>
        Authorization Letter <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/Authorization Letter.pdf') }}" target="_blank">(click here to download)</a>
        <br>
        Affidavit of Loss for CFP <a class="italic underline text-blue-600 hover:text-blue-800" href="{{ asset('pdf/Affidavit of Loss for CFP.pdf') }}" target="_blank">(click here to download)</a>

    </div>
</div>

@endsection