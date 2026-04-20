@extends('admin_template')

@section('css')
<style>
    .statistics-page {
        width: 100%;
        max-width: none;
        margin: 56px 250px 80px;
        padding: 0 8px 0 0;
    }

    .statistics-title {
        color: #045397;
        font-size: 2.2rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 46px;
    }

    .statistics-toolbar {
        display: flex;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
        margin-bottom: 18px;
        padding: 0 6px;
    }

    .statistics-toolbar-label {
        color: #111827;
        font-size: 1.45rem;
        font-weight: 600;
        margin: 0;
    }

    .statistics-year-select {
        width: 100px;
        height: 40px;
        border: 1px solid #3f3f46;
        border-radius: 10px;
        padding: 6px 12px;
        font-size: 1.05rem;
        color: #1f2937;
        background: #fff;
    }

    .statistics-card {
        background: #fff;
        border: 1px solid #e8edf4;
        border-radius: 16px;
        box-shadow: 0 6px 24px rgba(15, 23, 42, 0.08);
        padding: 22px 26px 18px;
        width: 100%;
        max-width: none;
    }

    .statistics-card + .statistics-card {
        margin-top: 28px;
    }

    .statistics-card-title {
        font-size: 1.3rem;
        font-weight: 800;
        color: #111827;
        margin-bottom: 18px;
        text-transform: uppercase;
    }

    .statistics-subsection {
        margin-top: 32px;
    }

    .statistics-subsection-title {
        border-bottom: 1px solid #9ca3af;
        color: #111827;
        font-size: 1.15rem;
        font-weight: 700;
        margin-bottom: 0;
        padding: 0 0 10px;
        text-transform: uppercase;
    }

    .statistics-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
    }

    .statistics-table thead th {
        border-bottom: 1px solid #9ca3af;
        color: #111827;
        font-size: 1.1rem;
        font-weight: 700;
        padding: 0 0 10px;
    }

    .statistics-table tbody td {
        border-bottom: 1px solid #9ca3af;
        color: #334155;
        font-size: 1rem;
        padding: 10px 0;
    }

    .statistics-table thead th:nth-child(1),
    .statistics-table tbody td:nth-child(1) {
        text-align: left;
    }

    .statistics-table thead th:nth-child(2),
    .statistics-table tbody td:nth-child(2),
    .statistics-table thead th:nth-child(3),
    .statistics-table tbody td:nth-child(3) {
        text-align: right;
        white-space: nowrap;
    }

    .statistics-table thead th:nth-child(2),
    .statistics-table tbody td:nth-child(2) {
        width: 140px;
    }

    .statistics-table thead th:nth-child(3),
    .statistics-table tbody td:nth-child(3) {
        width: 140px;
    }

    .statistics-table-rowless tbody td:nth-child(2) {
        color: transparent;
    }

    .statistics-card-academic .statistics-table tbody td:nth-child(2),
    .statistics-card-academic .statistics-table thead th:nth-child(2) {
        text-align: left;
    }

    .statistics-table-academic tbody td:first-child {
        width: 300px;
    }

    .statistics-table-academic tbody td:nth-child(2),
    .statistics-table-academic thead th:nth-child(2) {
        width: auto !important;
        text-align: left !important;
        padding-left: 0 !important;
        white-space: normal;
    }

    .statistics-card-metrics .statistics-table tbody td:nth-child(2),
    .statistics-card-metrics .statistics-table thead th:nth-child(2) {
        text-align: right !important;
        padding-left: 0 !important;
        white-space: nowrap;
    }

    .statistics-table-staff tbody td:nth-child(2),
    .statistics-table-staff tbody td:nth-child(3) {
        text-align: right;
        white-space: nowrap;
    }

    .statistics-table-staff tbody td:nth-child(2) {
        width: 220px;
    }

    .statistics-table-staff tbody td:nth-child(3) {
        width: 220px;
    }

    @media (max-width: 768px) {
        .statistics-page {
            margin-top: 32px;
            padding: 0 10px;
            margin: 56px auto 80px;
        }

        .statistics-title {
            font-size: 1.85rem;
            margin-bottom: 28px;
        }

        .statistics-toolbar-label {
            font-size: 1.05rem;
        }

        .statistics-card {
            padding: 18px 16px 16px;
        }

        .statistics-card-title {
            font-size: 1.45rem;
        }

        .statistics-table thead th,
        .statistics-table tbody td {
            font-size: .93rem;
        }
    }
</style>
@endsection

@section('content')
<div class="statistics-page">
    <h1 class="statistics-title">Statistics Report</h1>

    <form method="GET" action="{{ route('admin.statistics') }}" class="statistics-toolbar">
        <p class="statistics-toolbar-label">Annual Report for the Year</p>
        <select name="year" class="statistics-year-select" onchange="this.form.submit()">
            @foreach($available_years as $year)
                <option value="{{ $year }}" {{ (int) $selected_year === (int) $year ? 'selected' : '' }}>
                    {{ $year }}
                </option>
            @endforeach
        </select>
    </form>

    <section class="statistics-card">
        <h2 class="statistics-card-title">Active Students</h2>

        <table class="statistics-table">
            <thead>
                <tr>
                    <th>KPI Row</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($active_students_rows as $row)
                    <tr>
                        <td>{{ $row['label'] }}</td>
                        <td>{{ number_format($row['value']) }}</td>
                        <td>{{ $row['percentage'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Ethnicity</h3>
            <table class="statistics-table">
                <tbody>
                    @foreach($ethnicity_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Gender</h3>
            <table class="statistics-table">
                <tbody>
                    @foreach($gender_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Programs</h3>
            <table class="statistics-table">
                <tbody>
                    @foreach($program_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="statistics-card">
        <h2 class="statistics-card-title">Graduates</h2>

        <table class="statistics-table">
            <thead>
                <tr>
                    <th>KPI Row</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($graduate_rows as $row)
                    <tr>
                        <td>{{ $row['label'] }}</td>
                        <td>{{ number_format($row['value']) }}</td>
                        <td>{{ $row['percentage'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Ethnicity</h3>
            <table class="statistics-table">
                <tbody>
                    @foreach($graduate_ethnicity_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Gender</h3>
            <table class="statistics-table">
                <tbody>
                    @foreach($graduate_gender_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Programs</h3>
            <table class="statistics-table">
                <tbody>
                    @foreach($graduate_program_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="statistics-subsection">
            <h3 class="statistics-subsection-title">Distribution - Tracks</h3>
            <table class="statistics-table statistics-table-rowless">
                <tbody>
                    @foreach($graduate_track_rows as $row)
                        <tr>
                            <td>{{ $row['label'] }}</td>
                            <td>{{ number_format($row['value']) }}</td>
                            <td>{{ $row['percentage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section class="statistics-card">
        <h2 class="statistics-card-title">Admisson Pipeline</h2>

        <table class="statistics-table">
            <tbody>
                <tr>
                    <td>Applications</td>
                    <td>{{ number_format($applications_count) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Enrollments</td>
                    <td>{{ number_format($enrollments_count) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Conversion Rate</td>
                    <td></td>
                    <td>{{ $conversion_rate }}</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="statistics-card">
        <h2 class="statistics-card-title">Enrollment Flow</h2>

        <table class="statistics-table">
            <tbody>
                <tr>
                    <td>New Enrollments</td>
                    <td>{{ number_format($new_enrollments_count) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Withdrawals</td>
                    <td>{{ number_format($withdrawals_count) }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Net Growth</td>
                    <td>{{ number_format($net_growth_count) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="statistics-card statistics-card-academic">
        <h2 class="statistics-card-title">Academic Performance</h2>

        <table class="statistics-table statistics-table-academic">
            <tbody>
                <tr>
                    <td>Graduation Rate</td>
                    <td>{{ $graduation_rate }} (who enrolled in the beginning of 12th grade and finished it)</td>
                </tr>
                <tr>
                    <td>Average GPA (4.0 Scale)</td>
                    <td>{{ $average_gpa }}</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="statistics-card">
        <h2 class="statistics-card-title">Revenue</h2>

        <table class="statistics-table">
            <tbody>
                @foreach($revenue_rows as $row)
                    <tr>
                        <td>{{ $row['label'] }}</td>
                        <td>{{ number_format($row['value'], 2) }} USD</td>
                        <td>{{ $row['percentage'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section class="statistics-card">
        <h2 class="statistics-card-title">Staff</h2>

        <table class="statistics-table statistics-table-staff">
            <tbody>
                @foreach($staff_rows as $row)
                    <tr>
                        <td>{{ $row['label'] }}</td>
                        <td>{{ number_format($row['counts']['employees']) }} Employees</td>
                        <td>{{ number_format($row['counts']['freelancers']) }} Freelancers</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section class="statistics-card statistics-card-metrics">
        <h2 class="statistics-card-title">Metrics</h2>

        <table class="statistics-table statistics-table-academic">
            <tbody>
                @foreach($metric_rows as $row)
                    <tr>
                        <td>{{ $row['label'] }}</td>
                        <td>{{ $row['value'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection
