#!/bin/bash

# Set the MySQL connection parameters
MYSQL_USER="root"
MYSQL_PASSWORD="POS2022"
MYSQL_DATABASE="positiiv_db"

# Specify the path to the large SQL file
SQL_FILE="madhyapradesh.sql"

# Split the SQL file into smaller chunks (e.g., 100MB each)
SPLIT_SIZE=100000000  # 100MB in bytes

# Create a temporary directory to store the chunks
TMP_DIR="sql_chunks"
mkdir -p "$TMP_DIR"

# Split the SQL file into smaller chunks
split -b "$SPLIT_SIZE" "$SQL_FILE" "$TMP_DIR/chunk_"

# Iterate through the chunks and import them one by one
for CHUNK_FILE in "$TMP_DIR"/chunk_*; do
  echo "Importing $CHUNK_FILE"
  mysql -u "$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" < "$CHUNK_FILE"
done

# Clean up temporary files and directory
rm -rf "$TMP_DIR"

echo "Import completed!"

