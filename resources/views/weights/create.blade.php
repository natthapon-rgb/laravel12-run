<x-layouts.weight title="เพิ่มข้อมูลน้ำหนัก">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">➕ เพิ่มข้อมูลน้ำหนัก</h4>

                    <form action="{{ route('weights.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">วันที่บันทึก <span class="text-danger">*</span></label>
                            <input type="date"
                                   name="recorded_date"
                                   class="form-control @error('recorded_date') is-invalid @enderror"
                                   value="{{ old('recorded_date', date('Y-m-d')) }}">
                            @error('recorded_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">น้ำหนัก (กก.) <span class="text-danger">*</span></label>
                            <input type="number"
                                   step="0.01"
                                   name="weight_kg"
                                   class="form-control @error('weight_kg') is-invalid @enderror"
                                   placeholder="เช่น 65.50"
                                   value="{{ old('weight_kg') }}">
                            @error('weight_kg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">บันทึกเพิ่มเติม</label>
                            <textarea name="note"
                                      class="form-control @error('note') is-invalid @enderror"
                                      rows="3"
                                      placeholder="เช่น หลังออกกำลังกาย, ก่อนอาหารเช้า">{{ old('note') }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('weights.index') }}" class="btn btn-secondary">ยกเลิก</a>
                            <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-layouts.weight>