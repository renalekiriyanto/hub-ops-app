@extends('layouts.main')
@section('title', 'Create Inbound')
@section('content')
    <div class="container-fluid">
        <div class="row g-4">
            <div class="col">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Form Create Inbound</h3>
                    </div>
                    <form action="{{ route('monitoring.inbound.store') }}" method="POST">
                        @csrf
                        <div class="card-body">

                            {{-- Date --}}
                            <div class="mb-3">
                                <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" value="{{ old('date') }}" required />
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Arrival Time --}}
                            <div class="mb-3">
                                <label for="arrival_time" class="form-label">Arrival Time <span
                                        class="text-danger">*</span></label>
                                <input type="datetime-local"
                                    class="form-control @error('arrival_time') is-invalid @enderror" id="arrival_time"
                                    name="arrival_time" value="{{ old('arrival_time') }}" required />
                                @error('arrival_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Slot Name --}}
                            <div class="mb-3">
                                <label for="slot_name" class="form-label">Slot Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('slot_name') is-invalid @enderror"
                                    id="slot_name" name="slot_name" value="{{ old('slot_name') }}"
                                    placeholder="Masukkan nama slot" required />
                                @error('slot_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Is Additional Slot --}}
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_additional_slot" value="0" />
                                    <input type="checkbox"
                                        class="form-check-input @error('is_additional_slot') is-invalid @enderror"
                                        id="is_additional_slot" name="is_additional_slot" value="1"
                                        {{ old('is_additional_slot') ? 'checked' : '' }} />
                                    <label class="form-check-label" for="is_additional_slot">Additional Slot</label>
                                </div>
                                @error('is_additional_slot')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Total Order --}}
                            <div class="mb-3">
                                <label for="total_order" class="form-label">Total Order</label>
                                <input type="number" class="form-control @error('total_order') is-invalid @enderror"
                                    id="total_order" name="total_order" value="{{ old('total_order', 0) }}"
                                    min="0" />
                                @error('total_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Total Bulky --}}
                            <div class="mb-3">
                                <label for="total_bulky" class="form-label">Total Bulky</label>
                                <input type="number" class="form-control @error('total_bulky') is-invalid @enderror"
                                    id="total_bulky" name="total_bulky" value="{{ old('total_bulky', 0) }}"
                                    min="0" />
                                @error('total_bulky')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Total Bag --}}
                            <div class="mb-3">
                                <label for="total_bag" class="form-label">Total Bag</label>
                                <input type="number" class="form-control @error('total_bag') is-invalid @enderror"
                                    id="total_bag" name="total_bag" value="{{ old('total_bag', 0) }}" min="0" />
                                @error('total_bag')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('monitoring.inbound.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
