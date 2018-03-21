@forelse ($clients as $client)
  {{ $client }} 
@empty 'None'

@endforelse
