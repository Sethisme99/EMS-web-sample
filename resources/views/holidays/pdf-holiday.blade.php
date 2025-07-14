<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Holiday Request By- {{ $holiday->employee->first_name }} {{ $holiday->employee->last_name }}</title>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td align="center">
                    <table width="600" cellpadding="10"
                        style="text-align:left;"
                    > 
                        <tr>
                            <td>
                                <img 
                                    src="{{ public_path('images/'.$holiday->employee->image) }}"
                                    class="rounded"
                                    alt="{{ $holiday->employee->first_name }}" 
                                    with="250"
                                    height="250"    
                                >
                            </td>
                            <td colspan="2" align="center">
                                <h1>
                                    {{ $holiday->employee->first_name }} {{ $holiday->employee->last_name }}
                                </h1>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <h2>
                                    Holiday Request
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Starting On 
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->start_date }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Ending On
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->end_date }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Status
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->status }}
                            </td>
                        </tr>
                        @if (!empty($holiday->notes))
                            <tr>
                                <td>
                                    <strong>
                                        Notes
                                    </strong>
                                </td>
                                <td>
                                    {{ $holiday->notes }}
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2">
                                <h2>
                                    Company Information
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Hire Date
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->employee->hire_date }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Salary
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->employee->salary }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Department
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->employee->department->name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Position
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->employee->position->title }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    Status
                                </strong>
                            </td>
                            <td>
                                {{ $holiday->employee->status ? 'Active' : 'Inactive'}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>