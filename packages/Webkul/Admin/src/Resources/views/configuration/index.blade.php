@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.configuration.title') }}
@stop

@push('css')

    <style>

        @media only screen and (max-width: 768px){
            .content-container .content .page-header .page-title .control-group .control{
                width: 100% !important;
                margin-top:-25px !important;
            }
        }

    </style>

@endpush

@section('content')
    <div class="content">
        @php
            $locale = core()->checkRequestedLocaleCodeInRequestedChannel();
            $channel = core()->getRequestedChannelCode();
            $channelLocales = core()->getAllLocalesByRequestedChannel()['locales'];
        @endphp

        <div class="configuration">
            <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

                <div class="page-header">

                    <div class="page-title">
                        <h1>
                            {{ __('admin::app.configuration.title') }}
                        </h1>

                        <div class="control-group">
                            <select class="control" id="channel-switcher" name="channel">
                                @foreach (core()->getAllChannels() as $channelModel)

                                    <option value="{{ $channelModel->code }}" {{ ($channelModel->code) == $channel ? 'selected' : '' }}>
                                        {{ core()->getChannelName($channelModel) }}
                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="control-group">
                            <select class="control" id="locale-switcher" name="locale">
                                @foreach ($channelLocales as $localeModel)

                                    <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                        {{ $localeModel->name }}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="page-action">
                        <button type="submit" class="btn btn-lg btn-primary">
                            {{ __('admin::app.configuration.save-btn-title') }}
                        </button>
                    </div>
                </div>

                <div class="page-content">
                    <div class="form-container">
                        @csrf()

                        @if ($groups = \Illuminate\Support\Arr::get($config->items, request()->route('slug') . '.children.' . request()->route('slug2') . '.children'))

                            @foreach ($groups as $key => $item)

                                <accordian title="{{ __($item['name']) }}" :active="true">
                                    <div slot="body">

                                        @foreach ($item['fields'] as $field)

                                            @include ('admin::configuration.field-type')

                                            @php ($hint = $field['title'] . '-hint')
                                            @if ($hint !== __($hint))
                                                {{ __($hint) }}
                                            @endif

                                        @endforeach

                                    </div>
                                </accordian>

                            @endforeach
                        @endif

                    </div>
                </div>

            </form>

        </div>   

    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#channel-switcher, #locale-switcher').on('change', function (e) {
                $('#channel-switcher').val()
                var query = '?channel=' + $('#channel-switcher').val() + '&locale=' + $('#locale-switcher').val();

                window.location.href = "{{ route('admin.configuration.index', [request()->route('slug'), request()->route('slug2')]) }}" + query;
            })
        });
    </script>
@endpush