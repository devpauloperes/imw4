INSERT INTO Formulario (banco, tabela, nome, tipo, legenda, nulo, tamanhostr, tamanhoint)
SELECT 
TABLE_SCHEMA, TABLE_NAME, COLUMN_NAME nome, DATA_TYPE tipo, COLUMN_COMMENT legenda, 
IS_NULLABLE nulo, CHARACTER_MAXIMUM_LENGTH tamanhostr, 
NUMERIC_PRECISION tamanhonum

FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA = 'imw4' AND TABLE_NAME not in (SELECT DISTINCT tabela FROM gerador.Formulario)
AND COLUMN_NAME NOT IN ('id', 'deleted_at' ,'created_at', 'created_by', 'updated_at', 'updated_by' )
AND TABLE_NAME not in ( 'FuncaoEclesiastica', 
                        'Usuario', 
                        'Usuario_Instituicao', 
                        'TipoInstituicao', 
                        'Instituicao',
                        'Comissao',
                        'TipoClerigo'
                        ,'aspirante_aspirante'
                        ,'aspirante_aspirante_documentos'
                        ,'clerigo_clerigo'
                        ,'clerigo_clerigo_dependente'
                        );

