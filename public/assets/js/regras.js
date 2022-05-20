
function remover(action)
{
	if ( confirm("Deseja realmente excluir esse registro?") )
	{
		window.location = action;
	}
	else {
		return false;
	}

}