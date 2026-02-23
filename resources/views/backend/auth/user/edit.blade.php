@inject('model', '\App\Domains\Auth\Models\User')

@extends('backend.layouts.app')

@section('title', __('Update User'))

@section('content')
    <x-forms.patch :action="route('admin.auth.user.update', $user)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Update User')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.auth.user.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div x-data="{userType : '{{ $user->type }}'}">
                    @if (!$user->isMasterAdmin())
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">@lang('Type')</label>

                            <div class="col-md-10">
                                <select name="type" class="form-control" required x-on:change="userType = $event.target.value">
                                    <option value="{{ $model::TYPE_USER }}" {{ $user->type === $model::TYPE_USER ? 'selected' : '' }}>@lang('User')</option>
                                    <option value="{{ $model::TYPE_ADMIN }}" {{ $user->type === $model::TYPE_ADMIN ? 'selected' : '' }}>@lang('Administrator')</option>
                                </select>
                            </div>
                        </div><!--form-group-->
                    @endif

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">@lang('Name')</label>

                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $user->name }}" maxlength="100" required />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">@lang('E-mail Address')</label>

                        <div class="col-md-10">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $user->email }}" maxlength="255"  />
                        </div>
                    </div><!--form-group-->

                    <div x-data="{ isEmployee : {{ old('is_employee', $user->is_employee) ? 'true' : 'false' }} }">
                        <div class="form-group row">
                            <label for="is_employee" class="col-md-2 col-form-label">@lang('Is Employee')</label>

                            <div class="col-md-10">
                                <div class="form-check">
                                    <input
                                        type="checkbox"
                                        name="is_employee"
                                        id="is_employee"
                                        value="1"
                                        class="form-check-input"
                                        x-on:click="isEmployee = !isEmployee"
                                        {{ old('is_employee', $user->is_employee) ? 'checked' : '' }} />
                                </div><!--form-check-->
                            </div>
                        </div><!--form-group-->

                        <div x-show="isEmployee">
                            <div class="form-group row">
                                <label for="employee_code" class="col-md-2 col-form-label">@lang('Employee Code') <span class="text-danger">*</span></label>

                                <div class="col-md-10">
                                    <input type="text" name="employee_code" id="employee_code" class="form-control" placeholder="{{ __('Employee Code') }}" value="{{ old('employee_code', $user->employee->employee_code ?? '') }}" maxlength="100" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="position" class="col-md-2 col-form-label">@lang('Position')</label>

                                <div class="col-md-10">
                                    <input type="text" name="position" id="position" class="form-control" placeholder="{{ __('Position') }}" value="{{ old('position', $user->employee->position ?? '') }}" maxlength="100" />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="department" class="col-md-2 col-form-label">@lang('Department')</label>

                                <div class="col-md-10">
                                    <input type="text" name="department" id="department" class="form-control" placeholder="{{ __('Department') }}" value="{{ old('department', $user->employee->department ?? '') }}" maxlength="100" />
                                </div>
                            </div><!--form-group-->
                        </div>
                    </div>

                    @if (!$user->isMasterAdmin())
                        @include('backend.auth.includes.roles')

                        @if (!config('boilerplate.access.user.only_roles'))
                            @include('backend.auth.includes.permissions')
                        @endif
                    @endif
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update User')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
