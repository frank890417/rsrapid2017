echo "Enter Commit message:"
read msg
sh cache.sh
git add .
git commit -m "$msg"
git push
echo ""
echo "Git Commit complete!"
echo ""
echo "Watch(y/n) ?"
read option
if ["$option" == "y"]; then
  gulp watch
fi
