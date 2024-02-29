@extends('layouts.default')
@section('content')
<section class="inner-section-wrapper">
    <div class="bg-white inventory-form">
        <div class="title-wrapper">
            <div class="page-title flex align-items-center">
                {{isset($editData) ? 'Edit' : 'Create'}} Category
            </div>
        </div>
        <div class="container">
            <div class="inventory-form-wrapper">
                {!! Form::open(['url' => isset($editData) ? route('Category.update', $editData->id) : route('Category.store'), 'class'=>'form-data','id'=>'category_form']) !!}
                @if(isset($editData))
                    {{ method_field('PUT') }}
                @endif
                <div class="row">
                    <div class="col-5">
                        <div class="form-group">
                            <label class="input-label required">Category name</label>
                            {!! Form::text('category_name', isset($editData) ? $editData->category_name : old('category_name'), ['class'=>'input-field','placeholder'=>'Enter category name','data-validation'=>'required']) !!}
                            @if($errors->has('category_name'))
                                @foreach($errors->get('category_name') as $message)
                                    <label class="validation-error" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-button-wrapper">
                    @if(isset($editData))
                    <a href="{{route('Category.create')}}" class="btn-cancel">Back to create</a>
                    @else
                    <a href="{{route('Category.index')}}" class="btn-cancel">Cancel</a>
                    @endif
                    <button type="submit" class=" btn-action-primary">{{(isset($editData)) ? 'Update ' : 'Create '}} Category</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@include('scripts.validCategory')
@endpush
