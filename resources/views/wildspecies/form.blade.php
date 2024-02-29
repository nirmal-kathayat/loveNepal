@extends('layouts.default')
@section('content')
<section class="inner-section-wrapper">
	<div class=" bg-white inventory-form">
		<div class="title-wrapper">
			<div class="page-title flex align-items-center">
				{{isset($room) ? 'Edit' : "Create"}} Wild Species
			</div>
		</div>
		<div class="container">
			<div class="inventory-form-wrapper">
				{!! Form::open(['url' => isset($editData) ? route('wildSpecies.update', $editData->id) :
				route('wildSpecies.store'), 'class'=>'form-data','id'=>'wildSpecies_form','enctype' => 'multipart/form-data']) !!}
				@if(isset($editData))
				{{ method_field('PUT') }}
				@endif

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label class="input-label required">Wild Species name</label>
							{!! Form::text('name', isset($editData) ? $editData->name :
							old('name'), ['class'=>'input-field','placeholder'=>
							'species name','data-validation'=>'required','id'=>'species_name']) !!}
							@error('name')
							<span class="validation-error">
								{{$message}}
							</span>
							@enderror
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label class="input-label required">Wild life type</label>
							<div class="category-dropdown">
								<select name="wildlifetype_id" class="form-control" data-validation="required" id="species_title">
									<option value="" disabled selected>Select wild life
									</option>
									@foreach ($lists as $list => $wildList)
									<option value="{{ $list }}" {{ isset($editData) && $editData->wildlifetype_id == $list ? 'selected' : '' }}>
										{{ $wildList }}
									</option>
									@endforeach
								</select>
							</div>
							@if ($errors->has('wildlifetype_id'))
							<span class="validation-error">{{ $errors->first('wildlifetype_id') }}</span>
							@endif
						</div>

					</div>
				</div>

				<div class="col-6">
					<div class="form-group">
						<label class="input-label required">Choose Image</label>
						{!! Form::file('image', ['class' => 'block w-full text-sm text-gray-500 file:mr-4
						file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
						file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 form-control',
						'data-validation' => isset($editData) ? "" : "required",'id'=>'image','onchange' =>
						'showFileName(this)']) !!}
						@error('image')
						<span class="validation-error">{{ $message }}</span>
						@enderror

						@if(isset($editData) && $editData->image)
						<img src="{{ asset($editData->image) }}" class="img-edit" alt=" ">
						<!-- <p>{{ $editData->image }}</p> -->
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							{!! Form::label('overview', 'Overview',['class' => 'input-label']) !!}
							{!! Form::textarea('overview', old('overview',$inventory['overview'] ??
							''), ['class'=>'form-control', 'placeholder'=>'Enter here overview']) !!}
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							{!! Form::label('physical_characteristics', 'Physical Characteristics',['class'
							=>
							'input-label']) !!}
							{!! Form::textarea('physical_characteristics',
							old('physical_characteristics',$inventory['physical_characteristics'] ??
							''), ['class'=>'form-control', 'placeholder'=>'Enter here physical character'])
							!!}
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-6">
						<div class="form-group">
							{!! Form::label('conservation_status', 'Conservation Status',['class' =>
							'input-label']) !!}
							{!! Form::textarea('conservation_status',
							old('conservation_status',$inventory['conservation_status'] ??
							''), ['class'=>'form-control', 'placeholder'=>'Enter here conservation status'])
							!!}
						</div>
					</div>

					<div class="col-6">
						<div class="form-group">
							{!! Form::label('significance_protection', 'Significance and
							Protection',['class' =>
							'input-label']) !!}
							{!! Form::textarea('significance_protection',
							old('significance_protection',$inventory['significance_protection'] ??
							''), ['class'=>'form-control', 'placeholder'=>'Enter here significance and
							protection']) !!}
						</div>
					</div>
				</div>

				<div class="form-button-wrapper">
					@if(isset($editData))
					<a href="{{route('wildSpecies.create')}}" class="btn-cancel">Back to create</a>
					@else
					<a href="{{route('wildSpecies.index')}}" class="btn-cancel">Cancel</a>
					@endif
					<button type="submit" id="submitSpecies" class=" btn-action-primary">{{(isset($editData)) ? 'Update ' : 'Add '}} wild species</button>

				</div>


				{!! Form::close() !!}
			</div>
		</div>

	</div>
</section>
@endsection
@push('scripts')
@include('scripts.validSpecies')
@endpush