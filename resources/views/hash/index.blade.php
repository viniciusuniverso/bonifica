<div>
    <form>
        Número de tentativas: <input type="number" id="num_tentativas" name="num_tentativas">
        <input type="submit" value="Filtrar">
    </form>
    <table border="1">
         <tr>
            <td>Número</td>
            <td>Data</td>
            <td>String entrada</td>
            <td>Chave encontrada</td>
        </tr>
        @foreach($hashs as $hash)    
            <tr>
                <td>{{$hash->id}}</td>
                <td>{{$hash->data}}</td>
                <td>{{$hash->string_entrada}}</td>
                <td>{{$hash->chave}}</td>
            </tr>
        @endforeach
    </table>
    {{
       $hashs->links()
    }}
</div>
