@extends('frontend.beforeloginlayout.app')

@section('content')

<section class="for-w-100 main-content innerpage  login-page">
        <div class="container">
        	<div class="row">
                <div class="col-sm-12">
                    <h1 class="inner-page-title">
                        FAQ
                    </h1>
                </div>
            </div>
<br>
<div class="row">
 <div class="col-sm-12">
    <div class="accordion faq-accordian" id="faq">
        @forelse ($get_faqs as $get_faq)
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-header-link @if ($loop->index) collapsed @endif" data-toggle="collapse" data-target="#faq{{ $loop->iteration }}"
                aria-expanded="true">{{ $get_faq->question }}</a>
            </div>

            <div id="faq{{ $loop->iteration }}" class="collapse @if ($loop->index == 0) show @endif" data-parent="#faq">
                <div class="card-body">
                    {{ $get_faq->answer }}
                </div>
            </div>
        </div>
        @empty

        @endforelse

        {{-- <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq2"
                aria-expanded="true">Benefits of Chiropractic Care</a>
            </div>

            <div id="faq2" class="collapse" data-parent="#faq">
                <div class="card-body">
                There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.There’s an old maxim that states, “No fun for the writer, no fun for the reader.” No matter what industry you’re working in, as a blogger, you should live and die by this statement.
                Before you do any of the following steps, be sure to pick a topic that actually interests you. Noth ing – and I mean NOTHING – will kill a blog it’s a little embarrassing
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq3"
                aria-expanded="true">Benefits of Chiropractic Care</a>
            </div>

            <div id="faq3" class="collapse" data-parent="#faq">
                <div class="card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf
                    moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea
                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim
                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div> --}}
    </div>
</div>
</div>
</div>
</section>



@endsection
