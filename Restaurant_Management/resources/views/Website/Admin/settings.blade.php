@extends('layouts.webadmin')
 
@section('content')
	<div class="row">
	    <div class="col-xs-2">
            <!-- required for floating -->
            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-left sideways">
                <li class="active"><a href="#menu" data-toggle="tab">Menu Settings</a></li>
                <li><a href="#category" data-toggle="tab">Category</a></li>
            </ul>
        </div>
        <div class="col-xs-10">
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="menu">
                	<div class="row">
					    <div class="col-lg-12 margin-tb">
					        <div class="pull-left">
					            <h2>Menu</h2>
					        </div>
					        <div class="pull-right">
					        	@permission('menu-create')
					            <a class="btn btn-success" href="{{ route('menu.create') }}"> Create New Menu</a>
					            @endpermission
					        </div>
					    </div>
					</div>
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif
					<ul class="nav nav-tabs text-center">
		          		<?php $i = 0; ?>
						  @foreach($categories as $key => $category)
				          		<?php $i++ ?>
				          		@if($i == 1)
				          			<?php $cat ='active' ?>
				          		@else
				          			<?php $cat = 'inactive' ?>
				          		@endif
					            <li class="{{ $cat }}">
					            	<a href="#tab-{{$i}}" data-toggle="tab" aria-expanded="false">
					            		<i class="glyph-icon flaticon-coffee-cup"></i>{{ $category->category }}
					            	</a>
					            </li>
						 @endforeach
			        </ul>
		        <div class="tab-content" style="margin-top: 15px;">
					<?php $i=0?>
			          	@foreach ($categories as $category)
			          		<?php $i++ ?>
			          		@if($i == 1)
				          		<?php $cat = 'active in' ?>
				          	@else
				          		<?php $cat = 'inactive' ?>
				          	@endif
			            <div role="tabpane{{$i}}" class="tab-pane fade {{$cat}}" id="tab-{{$i}}">
		                	<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>Image</th>
									<th>Title</th>
									<th>Category</th>
									<th>Price</th>
									<th>Quantity</th>
									<th width="280px">Action</th>
								</tr>
								<?php $k = 0; ?>
			            @foreach ($menus as $key => $menu)
							@if($menu->category->category == $category->category)
			                		<tr>
										<td>{{ ++$k }}</td>
										<td>
											<img src="/uploads/{{ $menu->image }}" style="width:40px;"/>
										</td>
										<td>{{ $menu->title }}</td>
										<td>{{ $menu->category->category }}</td>
										<td>{{ $menu->price }}</td>
										<td>{{ $menu->quantity }}</td>
										<td>
											<a class="btn btn-info" href="{{ route('menu.show',$menu->id) }}">Show</a>
											@permission('menu-edit')
											<a class="btn btn-primary" href="{{ route('menu.edit',$menu->id) }}">Edit</a>
											@endpermission
											@permission('menu-delete')
											{!! Form::open(['method' => 'DELETE','route' => ['menu.destroy', $menu->id],'style'=>'display:inline']) !!}
								            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
								        	{!! Form::close() !!}
								        	@endpermission
										</td>
									</tr>
							@endif
			            @endforeach
		            		</table>
	            		</div>
					@endforeach					
	            	</div>
                </div>

                <div class="tab-pane" id="category">
                	<div class="row">
					    <div class="col-lg-12 margin-tb">
					        <div class="pull-left">
					            <h2>Categories</h2>
					        </div>
					        <div class="pull-right">
					        	@permission('category-create')
					            <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
					            @endpermission
					        </div>
					    </div>
					</div>
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif
                	<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Category</th>
							<th width="280px">Action</th>
						</tr>
						<?php $j = 0; ?>
	                	@foreach ($categories as $key => $category)
	                		<tr>
								<td>{{ ++$j }}</td>
								<td>{{ $category->category }}</td>
								<td>
									<a class="btn btn-info" href="{{ route('category.show',$category->id) }}">Show</a>
									@permission('category-edit')
									<a class="btn btn-primary" href="{{ route('category.edit',$category->id) }}">Edit</a>
									@endpermission
									@permission('category-delete')
									{!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $category->id],'style'=>'display:inline']) !!}
						            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						        	{!! Form::close() !!}
						        	@endpermission
								</td>
							</tr>
	            		@endforeach
            		</table>
                </div>
            </div>
        </div>
	</div>
@endsection