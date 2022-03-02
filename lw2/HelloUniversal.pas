PROGRAM HelloUniversal(INPUT, OUTPUT);
USES DOS;
VAR
  Text1, Text2: STRING;
  Ch: CAHR;
  YesNo: BOOLEAN;
  i: INTEGER;
BEGIN {HelloUniversal}
  Text := GETENV('QUERY_STRING');
  IF POS('name=', Text1) > 0
  THEN
    BEGIN
      i := POS('name=', Text1) + 4;
      Text2 := 'dear ';
      WHILE (Text[i] <>) AND (i <> LENGTH(Text1))
      DO
        BEGIN
          i := i + 1;
          IF Text1[i] <> '&'
          THEN
            Text2 := Text2 + Text1[i]
        END
    END
  ELSE
    Text2 := 'Anonumous';
  IF Text2 = ''
  THEN
    Text2 := 'Anonymous';
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('Hello ', Text, '!')
END. {HelloUniversal}
