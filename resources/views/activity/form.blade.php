@extends('layouts.default')
@section('content')
<section class="inner-section-wrapper">
    <div class="bg-white inventory-form">
        <div class="title-wrapper">
            <div class="page-title flex align-items-center">
                {{ isset($room) ? 'Edit' : "Create" }} Activity
            </div>
        </div>
        <div class="container">
            <div class="inventory-form-wrapper">
                {!! Form::open(['url' => isset($editActivity) ? route('activity.update', $editActivity->id) : route('activity.store'), 'class'=>'form-data','id'=>'activity_form']) !!}
                @if(isset($editActivity))
                {{ method_field('PUT') }}
                @endif

                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label class="input-label required">Activity name</label>
                            {!! Form::text('activity_name', isset($editActivity) ? $editActivity->activity_name : old('activity_name'), ['class'=>'input-field','placeholder'=>'Enter activity name','data-validation'=>'required','id'=>'activity_name']) !!}
                            @if($errors->has('activity_name'))
                            @foreach($errors->get('activity_name') as $message)
                            <label class="validation-error" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-button-wrapper">
                    @if(isset($editActivity))
                    <a href="{{route('activity.create')}}" class="btn-cancel">Back to create</a>
                    @else
                    <a href="{{route('activity.index')}}" class="btn-cancel">Cancel</a>
                    @endif
                    <button type="submit" id="submit_activity" class=" btn-action-primary">{{(isset($editActivity)) ? 'Update ' : 'Create '}} Activity</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
@include('scripts.validation')
@endpush