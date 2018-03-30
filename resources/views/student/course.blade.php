@extends('layouts.app')

@section('title','Course')

@push('css')

@endpush

@section('content')
    <div class="row">
        @foreach(Auth::user()->courses as $course)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $course->name }}</h4>
                    <h6 class="card-subtitle">Extend the default collapse behavior to create an accordion.</h6>
                    <div class="accordion" role="tablist">
                        @foreach($course->units as $unit)
                            <div class="card">
                                <div class="card-header" role="tab" id="heading-{{ $unit->id }}">
                                    <a data-toggle="collapse" href="#collapse-{{ $unit->id }}" aria-expanded="true" aria-controls="collapse-{{ $unit->id }}">
                                        {{ $unit->name }}
                                    </a>
                                </div>

                                <div id="collapse-{{ $unit->id }}" class="collapse" role="tabpanel" aria-labelledby="heading-{{ $unit->id }}" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row todo">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="toolbar toolbar--inner">
                                                        <div class="toolbar__label">{{ $unit->lessons->count() }} Total Lessons</div>
                                                    </div>

                                                    <div class="listview listview--bordered">

                                                        @if(!$unit->lessons->count() <= 0)
                                                            @foreach($unit->lessons as $lesson)
                                                                <div class="listview__item">
                                                                    <label class="custom-control custom-control--char todo__item">
                                                                        <input class="custom-control-input" type="checkbox" {{ $lesson->students()->where('is_complete',true)->count() == true ? 'checked' : '' }} disabled>
                                                                        <span class="custom-control--char__helper"><i>M</i></span>
                                                                        <div class="todo__info">
                                                                            <a href="">{{ $lesson->title }}</a>
                                                                            <small>{{ $lesson->updated_at->diffForHumans() }}</small>
                                                                        </div>

                                                                        <div class="listview__attrs">
                                                                            <span>#Marketing</span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <span class="view-more">No Lesson Found</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')

@endpush