@extends('layouts.site', ['bodyClass' => 'resources'])

@section ('content')
    <header>
        @include('partials.hero-resources', $hero)
    </header>
    <section>
    <h2 class="text-center">Coming Soon</h2>
        <div class="row small-up-1 medium-up-3">
            @foreach($navCards as $cards)
                <div class="column">
                    @include('partials.nav-card', $cards)
                </div>
            @endforeach
        </div>
    </section>
    <section class="required-text">
    <div class="row">
    <div class="column">
        <p>
            The California Department of Public Health, with funding from the United States Department of Agriculture’s Supplemental Nutrition Assistance Program – USDA SNAP, produced this material. These institutions are equal opportunity providers and employers. For important nutrition information, visit www.CaChampionsForChange.net.
        </p>
        <p>
            <strong>Non-ADA Disclaimer:</strong> If you have further questions or are having difficulty accessing
            these
            documents,
            please contact us at <a href="mailto:CDPH_NEOPBcustomercare@cdph.ca.gov?Subject=Non-ADA%20Disclaimer"
            target="_blank">CDPH_NEOPBcustomercare@cdph.ca.gov</a> to request this information in an alternate format.
        </p>
        </div>
    </div>

    </section>
@stop