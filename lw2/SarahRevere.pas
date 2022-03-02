PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  DOS;
VAR
  QueryString: STRING;
BEGIN {SarahRevere}
  QueryString := GetEnv('QUERY_STRING');
  WRITELN;
  IF (QueryString = 'lanters=1')
  THEN
    WRITELN('The British are coming by land.')
  ELSE
    IF (QueryString = 'lanters=2')
    THEN
      WRITELN('The British are coming by sea.')
    ELSE
      WRITELN('Sarah didn''t say anithing.' )
END.