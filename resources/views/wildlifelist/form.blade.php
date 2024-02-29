@extends('layouts.default')
@section('content')
<section class="inner-section-wrapper">
	<div class=" bg-white inventory-form">
		<div class="title-wrapper">
			<div class="page-title flex align-items-center">
				{{isset($room) ? 'Edit' : "Create"}} wild Life
			</div>
		</div>
		<div class="container">
			<div class="inventory-form-wrapper">
				{!! Form::open(['url' => isset($editData) ? route('wildLife.update', $editData->id) :
				route('wildLife.store'), 'class'=>'form-data','id'=>'wildLife_form', 'enctype' => 'multipart/form-data']) !!}
				@if(isset($editData))
				{{ method_field('PUT') }}
				@endif

				<div class="row">
					<div class="col-5">
						<div class="form-group">
							<label class="input-label required">Wild Life name</label>
							{!! Form::text('title', isset($editData) ? $editData->title : old('title'),
							['class'=>'input-field','placeholder'=>'Enter wild life
							','data-validation'=>'required','id'=>'wildLife_title']) !!}
							@if($errors->has('title'))
							@foreach($errors->get('title') as $message)
							<label class="validation-error" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
							@endforeach
							@endif
						</div>
					</div>


					<div class="col-4">
						<div class="form-group">
							<label for="image" class="input-label required">Choose Image</label>
							{!! Form::file('image[]', ['class' => 'block w-full text-sm text-gray-500 file:mr-4
							file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
							file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 form-control',
							'data-validation' => isset($editData) ? "" : "required",'id'=>'images','multiple'=>'multiple',
							'onchange' =>
							'showFileNames(this)']) !!}

							@if(isset($editData) && $editData->image)
							<img src="{{ asset($editData->image) }}" class="img-edit" alt=" ">
							<!-- <p>{{ $editData->image }}</p> -->
							@endif

							@error('image')
							<span class="validation-error">{{ $message }}</span>
							@enderror

						</div>
					</div>

				</div>

				<div class="form-button-wrapper">
					@if(isset($editData))
					<a href="{{route('wildLife.create')}}" class="btn-cancel">Back to create</a>
					@else
					<a href="{{route('wildLife.index')}}" class="btn-cancel">Cancel</a>
					@endif
					<button type="submit" id="submitWildLifeForm" class=" btn-action-primary">{{(isset($editData)) ? 'Update ' : 'Add '}} wild life</button>

				</div>


				{!! Form::close() !!}
			</div>
		</div>

	</div>
</section>

@endsection
@push('scripts')
@include('scripts.validWildLife')
@endpush