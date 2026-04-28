@extends('parent.dashboard')

@section('css')
<style>
    .protocols-page {
        width: 100%;
        max-width: 1160px;
        margin: 40px auto 80px;
        padding: 0 20px;
    }
    .protocols-title {
        text-align: center;
        font-size: 2.15rem;
        font-weight: 700;
        color: #111827;
        margin-bottom: 26px;
    }
    .protocols-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        padding: 28px 28px 22px;
    }
    .protocols-filters {
        padding-bottom: 18px;
        border-bottom: 1px solid #d1d5db;
        margin-bottom: 8px;
    }
    .protocols-filter-row {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-bottom: 10px;
    }
    .protocols-filter-row:last-child {
        margin-bottom: 0;
    }
    .protocols-year-select,
    .protocols-search-input {
        height: 42px;
        border: 1px solid #374151;
        border-radius: 10px;
        padding: 0 14px;
        font-size: 15px;
        color: #1f2937;
        background: #fff;
    }
    .protocols-year-select {
        width: 240px;
        max-width: 100%;
    }
    .protocols-search-input {
        flex: 1 1 auto;
        min-width: 0;
    }
    .protocols-search-button {
        height: 42px;
        border: 0;
        border-radius: 10px;
        background: #14b8d4;
        color: #fff !important;
        padding: 0 20px;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 10px 18px rgba(20, 184, 212, 0.18);
    }
    .protocols-search-button:hover {
        background: #0891b2;
        color: #fff;
    }
    .protocols-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }
    .protocols-table thead th {
        text-align: left;
        font-size: 1.05rem;
        font-weight: 700;
        color: #1f3b6d;
        padding: 10px 4px 12px;
        border-bottom: 1px solid #d1d5db;
    }
    .protocols-table tbody td {
        padding: 10px 4px;
        border-bottom: 1px solid #d1d5db;
        font-size: 1rem;
        color: #334155;
        vertical-align: middle;
    }
    .protocols-table th:nth-child(2),
    .protocols-table td:nth-child(2) {
        width: 110px;
    }
    .protocols-table th:nth-child(3),
    .protocols-table td:nth-child(3) {
        width: 120px;
        text-align: right;
    }
    .protocols-view-link {
        color: #2563eb;
        text-decoration: underline;
        font-weight: 500;
    }
    .protocols-empty {
        padding: 28px 4px 10px;
        color: #6b7280;
        font-size: 1rem;
    }
    @media (max-width: 768px) {
        .protocols-page {
            padding: 0 12px;
        }
        .protocols-card {
            padding: 20px 16px 16px;
        }
        .protocols-filter-row {
            flex-direction: column;
            align-items: stretch;
        }
        .protocols-year-select,
        .protocols-search-input,
        .protocols-search-button {
            width: 100%;
        }
        .protocols-table th:nth-child(2),
        .protocols-table td:nth-child(2),
        .protocols-table th:nth-child(3),
        .protocols-table td:nth-child(3) {
            width: auto;
            text-align: left;
        }
    }
</style>
@endsection

@section('content')
<div class="parent-page-content">
    <div class="protocols-page">
        <h1 class="protocols-title">List of students</h1>

        <div class="protocols-card">
            <form method="GET" action="{{ route('parent.protocols.index') }}" class="protocols-filters">
                <div class="protocols-filter-row">
                    <select name="year" class="protocols-year-select">
                        @foreach($available_years as $year)
                            <option value="{{ $year }}" {{ (int) $selected_year === (int) $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="protocols-filter-row">
                    <input
                        type="text"
                        name="search"
                        class="protocols-search-input"
                        placeholder="Search by name"
                        value="{{ $search }}"
                    >
                    <button type="submit" class="protocols-search-button">Search</button>
                </div>
            </form>

            <table class="protocols-table">
                <thead>
                    <tr>
                        <th>Student</th>
                        <th>Grade</th>
                        <th>Protocol</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ trim($student->student->fullname()) }}</td>
                            <td>{{ $student->grade ?? '-' }}</td>
                            <td>
                                <a
                                    href="{{ route('parent.protocols.show', ['student_id' => $student->student_id, 'year' => $selected_year, 'search' => $search]) }}"
                                    class="protocols-view-link"
                                >
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="protocols-empty">No students with successful login attempts were found for this year.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
