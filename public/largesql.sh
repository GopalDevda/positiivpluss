#!/bin/bash
MYSQL_USER="root"
MYSQL_PASSWORD="POS2022"
MYSQL_DATABASE="positiiv_db"
SQL_FILE="madhyapradesh.sql"

SPLIT_SIZE=100000000  # 100MB in by   
TMP_DIR="sql_chunks"
mkdir -p "$TMP_DIR"
split -b "$SPLIT_SIZE" "$SQL_FILE" "$TMP_DIR/chunk_"

for CHUNK_FILE in "$TMP_DIR"/chunk_*; do
  echo "Importing $CHUNK_FILE"
   mysql -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" --verbose "$MYSQL_DATABASE" < "$CHUNK_FILE"
 
# mysql -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" < "$CHUNK_FILE"
done

# Clean up temporary files and directory
rm -rf "$TMP_DIR"

echo "Import completed!"
