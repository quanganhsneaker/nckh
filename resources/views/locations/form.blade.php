<div class="mb-3">
    <label class="form-label">Tên địa điểm</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $location->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Vĩ độ (lat)</label>
    <input type="text" name="lat" class="form-control" value="{{ old('lat', $location->lat ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Kinh độ (lon)</label>
    <input type="text" name="lon" class="form-control" value="{{ old('lon', $location->lon ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">pH</label>
    <input type="number" step="0.1" name="pH" class="form-control" value="{{ old('pH', $location->pH ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">DO (mg/L)</label>
    <input type="number" step="0.1" name="DO" class="form-control" value="{{ old('DO', $location->DO ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">TSS (mg/L)</label>
    <input type="number" step="0.1" name="TSS" class="form-control" value="{{ old('TSS', $location->TSS ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">WQI</label>
    <input type="number" name="WQI" class="form-control" value="{{ old('WQI', $location->WQI ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Trạng thái</label>
    <select name="status" class="form-select" required>
        <option value="Tốt" {{ old('status', $location->status ?? '') == 'Tốt' ? 'selected' : '' }}>Tốt</option>
        <option value="Trung bình" {{ old('status', $location->status ?? '') == 'Trung bình' ? 'selected' : '' }}>Trung bình</option>
        <option value="Kém" {{ old('status', $location->status ?? '') == 'Kém' ? 'selected' : '' }}>Kém</option>
        <option value="Xấu" {{ old('status', $location->status ?? '') == 'Xấu' ? 'selected' : '' }}>Xấu</option>
    </select>
</div>
