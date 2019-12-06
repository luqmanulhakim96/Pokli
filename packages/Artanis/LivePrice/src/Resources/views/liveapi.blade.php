@foreach ($gap as $gaps)
                        <tr>
                        <td>{{ $gaps->last_updated }}</td>
                        <td>{{ $gaps->gram }}</td>
                        <td>{{ $gaps->price }}</td>
                        </tr>
                        @endforeach
